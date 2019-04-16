import Vue from 'vue'

// Lib imports
import axios from 'axios'

let client = axios.create({
  baseURL: `${window.origin}/admin/api/`,
  headers: {'Content-Type': 'application/json'}
})

// before a request is made start the nprogress
client.interceptors.request.use(config => {
  NProgress.start()
  return config
})

// before a response is returned stop nprogress
client.interceptors.response.use(response => {
  NProgress.done()
  return response
})

Vue.prototype.$http = client

export default client