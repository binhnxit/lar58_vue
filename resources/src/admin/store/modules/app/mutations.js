import { set, toggle } from 'admin/utils/vuex'

export default {
  setDrawer: set('drawer'),
  setImage: set('image'),
  setColor: set('color'),
  toggleDrawer: toggle('drawer'),

  SET_AUTH_INFO(state, user) {
    state.authInfo = user
  }
}
