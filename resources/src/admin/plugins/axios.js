import Vue from 'vue'

// Lib imports
import axios from 'axios'

let client = axios.create({
  baseURL: `${window.origin}/admin/api/`,
  headers: {'Content-Type': 'application/json'}
})
Vue.prototype.$http = client

export default client