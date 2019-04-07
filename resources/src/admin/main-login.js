import Vue from 'vue'
import VeeValidate from 'vee-validate'

import store from './store'
import '../bootstrap'
import './components'
import './plugins'
import Login from './views/Login'

window.Popper = require('popper.js').default

Vue.use(VeeValidate)


new Vue({
  store,
  render: h => h(Login)
}).$mount('#app-admin-login')

