import {TOKEN_KEY, TOKEN_TYPE} from 'admin/utils/constants'

import client from 'admin/plugins/axios'

export default {
  getToken: () => {
    let token = localStorage.getItem(TOKEN_KEY)
    let type = localStorage.getItem(TOKEN_TYPE)

    return token ? `${type} ${token}` : ''
  },

  getMe: () => {
    return client.get('users/me')
  },

  login: (params) => {
    let data = {
      grant_type: "password",
      client_id: process.env.MIX_CLIENT_ID,
      client_secret: process.env.MIX_CLIENT_SECRET,
      scope: "",
      username: params.email,
      password: params.password
    }

    return client.post('login', data)
  }
}
