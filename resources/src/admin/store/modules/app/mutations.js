import {TOKEN_KEY, TOKEN_TYPE} from 'admin/utils/constants'
export default {

  SET_AUTH_INFO(state, data) {
    state.authInfo = data.user
    state.accessToken = data.access_token
    state.tokenType = data.token_type
    state.refreshToken = data.refresh_token
    localStorage.setItem(TOKEN_KEY, data.access_token)
    localStorage.setItem(TOKEN_TYPE, data.token_type)
  },

  SET_AUTH_USER(state, data) {
    state.authInfo = data
  },

  SET_LOADING(state, status) {
    state.isLoading = status
  },

  SET_AUTHENTICATED(state, status) {
    state.authenticated = status
  }
}
