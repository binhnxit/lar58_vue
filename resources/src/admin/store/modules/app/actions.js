import client from 'admin/plugins/axios'
import router from 'admin/router'
import {error, success} from 'admin/plugins/alert'

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
    let data = {
      grant_type: "password",
      client_id: process.env.MIX_CLIENT_ID,
      client_secret: process.env.MIX_CLIENT_SECRET,
      scope: "",
      username: params.email,
      password: params.password
    }

    client.post('login', data)
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
    client.get('users/me')
      .then(res => {
        console.log(res)
        if (res.data.status) {
          //commit('SET_AUTH_INFO', res.data.data)
        }
      })
  },

  setLoading({commit}, status) {
    commit('SET_LOADING', status)
  }
}