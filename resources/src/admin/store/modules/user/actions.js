import {error, success} from 'admin/plugins/alert'
import router from 'admin/router'
import userService from 'admin/services/user'

export default {
  createUser({commit}, user) {
    userService.create(user)
      .then(res => {
        if (res.data.status) {
          commit('RECEIVE_USER', res.data.data)
          success('success')
          router.push('/users')
        }
      }).catch(err => {
        console.log(err)
        error('error')
    })
  },
  getListUsers({commit}) {
    userService.list()
      .then(res => {
        if (res.data.status) {
          commit('FETCH_USERS', res.data.data)
        }
      })
  },
}
