import client from 'admin/plugins/axios'
import router from 'admin/router'
import {error, success} from 'admin/plugins/alert'
import authService from 'admin/services/auth'

export default {
  onLogout() {
    client.get('logout')
      .then(res => {
        if (res.data.status) {
          router.push('/login')
        }
      })
  },

  onLogin({commit}, params) {
    authService.login(params)
      .then(res => {
        if (!res.data.status) {
          error(res.data.error.message)
        } else {
          success('Login successfully!!!')
          commit('SET_AUTHENTICATED', true)
          commit('SET_AUTH_INFO', res.data.data)
          router.push('/')
        }
      }).catch(err => {
        if (err.response.status === 401) {
          error('The user credentials were incorrect.')
        }
    })
  },

  getAuthInfo({commit}) {
    authService.getMe()
      .then(res => {
        if (res.data.status) {
          commit('SET_AUTHENTICATED', true)
          commit('SET_AUTH_USER', res.data.data)
        }
      }).catch(err => {
      commit('SET_AUTHENTICATED', false)
    })
  },

  setLoading({commit}, status) {
    commit('SET_LOADING', status)
  },

  setAuthInfo({commit}, data) {
    commit('SET_AUTHENTICATED', data.status)
    commit('SET_AUTH_USER', data.user)
  }
}