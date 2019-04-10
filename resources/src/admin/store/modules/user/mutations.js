
export default {
  RECEIVE_USER(state, user) {
    state.list.push(user)
  },
  SET_ERROR(state, error) {
    state.error = error
  },
  FETCH_USERS(state, users) {
    state.list = users
  }
}
