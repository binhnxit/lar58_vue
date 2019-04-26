import defaultImg from 'admin/img/themes/placeholders/placeholder.jpg'

export default {
  drawer: null,
  color: 'success',
  image: '/images/sidebar1.jpg',
  defaultUserImg: defaultImg,
  authInfo: {
    first_name: null,
    last_name: null,
    email: null,
  },
  authenticated: false,
  accessToken: null,
  tokenType: 'Bearer',
  refreshToken: null,
  isLoading: false,
}
