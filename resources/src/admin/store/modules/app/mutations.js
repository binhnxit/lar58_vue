
export default {

  SET_AUTH_INFO(state, user) {
    state.authInfo = user
  },

  SET_LOADING(state, status) {
    state.isLoading = status
  }
}
