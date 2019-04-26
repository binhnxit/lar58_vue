/**
 * Vue Router
 *
 * @library
 *
 * https://router.vuejs.org/en/
 */

// Lib imports
import Vue from 'vue'
import VueRouter from 'vue-router'
import Meta from 'vue-meta'
import store from '../store'
import authService from 'admin/services/auth'

// Routes
import paths from './paths'
import {error, success} from "../plugins/alert";

function route(path, view, name, meta) {
  return {
    name: name || view,
    path,
    component: (resovle) => import(
      `admin/views/${view}.vue`
      ).then(resovle),
    meta: meta
  }
}

Vue.use(VueRouter)

// Create a new router
const router = new VueRouter({
  mode: 'history',
  routes: paths.map(path => route(path.path, path.view, path.name, path.meta)).concat([
    {path: '*', redirect: '/dashboard'}
  ]),
  base: '/admin/',
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiredLogin)) {
    authService.getMe()
      .then(res => {
        store.dispatch('app/setAuth', true)
        next()
      }).catch(err => {
        next('/login')
    })
  }

  next()
})

router.beforeResolve((to, from, next) => {
  // If this isn't an initial page load.
  if (to.matched.some(record => record.meta.requiredLogin) && store.state.app.authenticated === false) {
    next('/login')
  }
  if (to.name) {
    // Start the route progress bar.
    NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  // Complete the animation of the route progress bar.
  NProgress.done()
})

Vue.use(Meta)

export default router
