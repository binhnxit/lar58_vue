import Vue from 'vue'

// Sync router with store
import { sync } from 'vuex-router-sync'

import store from './store'
import router from './router'
import '../bootstrap'
import './components'
import './plugins'
import i18n from './lang/i18n'
import App from './App'

window.Popper = require('popper.js').default


// Sync store with router
sync(store, router)

const vm = new Vue({
  i18n,
  store,
  router,
  render: h => h(App)
}).$mount('#app-admin')

export {vm}
