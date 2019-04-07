import Vue from 'vue'

// Lib imports
import axios from 'axios'

Vue.prototype.$http = axios.create({
  baseURL: `${window.origin}/admin/`,
})
