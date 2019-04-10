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

// Routes
import paths from './paths'

function route (path, view, name) {
  return {
    name: name || view,
    path,
    component: (resovle) => import(
      `admin/views/${view}.vue`
      ).then(resovle)
  }
}

Vue.use(VueRouter)

// Create a new router
const router = new VueRouter({
  mode: 'history',
  routes: paths.map(path => route(path.path, path.view, path.name)).concat([
    { path: '*', redirect: '/dashboard' }
  ]),
  base: '/admin/',
  // scrollBehavior (to, from, savedPosition) {
  //   if (savedPosition) {
  //     return savedPosition
  //   }
  //   if (to.hash) {
  //     return { selector: to.hash }
  //   }
  //   return { x: 0, y: 0 }
  // }
})

Vue.use(Meta)
export {router}
export default router
