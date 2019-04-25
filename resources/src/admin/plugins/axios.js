import Vue from 'vue'

// Lib imports
import axios from 'axios'

import {getToken} from 'admin/utils/auth'

let authentication = getToken()

let client = axios.create({
  baseURL: `${window.origin}/api/admin/v1/`,
  headers: {
    'Content-Type': 'application/json',
    'Authorization': authentication
  }
})

// before a request is made start the nprogress
client.interceptors.request.use(config => {
  NProgress.start()
  return config
})

// before a response is returnex`d stop nprogress
client.interceptors.response.use(response => {
  NProgress.done()
  return response
}, error => {
  return Promise.reject(error);
})

Vue.prototype.$http = client

export default client