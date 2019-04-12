import client from 'admin/plugins/axios'
import router from 'admin/router'

export default {
  onLogout() {
    client.get('logout')
      .then(res => {
        if (res.data.status) {
          router.push('/admin')
          window.location.reload()
        }
      })
  },

  getAuthInfo({commit}) {
    client.get('me')
      .then(res => {
        if (res.data.status) {
          commit('SET_AUTH_INFO', res.data.data)
        }
      })
  }
}