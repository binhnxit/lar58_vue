import Vue from 'vue'
import VeeValidate from 'vee-validate'
// Sync router with store
import { sync } from 'vuex-router-sync'

import store from './store'
import router from './router'
import '../bootstrap'
import './components'
import './plugins'
import App from './App'

window.Popper = require('popper.js').default

Vue.use(VeeValidate)

// Sync store with router
sync(store, router)

const vm = new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app-admin')

export {vm}
