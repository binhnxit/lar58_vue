import Vue from 'vue'

// Lib imports
import axios from 'axios'

import auth from 'admin/services/auth'

let client = axios.create({
  baseURL: `${window.origin}/api/admin/v1/`,
})

// before a request is made start the nprogress
client.interceptors.request.use(config => {
  NProgress.start()
  let authentication = auth.getToken()
  config.headers = {
    'Content-Type': 'application/json',
    'Authorization': authentication
  }
  return config
})

// before a response is returnex`d stop nprogress
client.interceptors.response.use(response => {
  NProgress.done()
  return response
}, error => {
  NProgress.done()
  return Promise.reject(error);
})

Vue.prototype.$http = client

export default client