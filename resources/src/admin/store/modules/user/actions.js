import client from 'admin/plugins/axios'
import {success, error} from 'admin/plugins/alert'
import router from 'admin/router'

export default {
  createUser({commit}, user) {
    client.post('users', user)
      .then(res => {
        if (res.data.status) {
          commit('RECEIVE_USER', res.data.data)
          success('Created user successfully!!')
          router.push('/users')
        }
      }).catch(err => {
        console.log(err)
        error('Error happen!!!')
    })
  },
  getListUsers({commit}) {
    client.get('users')
      .then(res => {
        if (res.data.status) {
          commit('FETCH_USERS', res.data.data)
        }
      })
  },
}
