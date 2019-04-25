/**
 * Define all of your application routes here
 * for more information on routes, see the
 * official documentation https://router.vuejs.org/en/
 */
export default [
  {
    path: '/login',
    name: 'Login',
    view: 'Login',
    meta: {
      requiredLogin: false
    }
  },
  {
    path: '/dashboard',
    // Relative to /admin/views
    name: 'Dashboard',
    view: 'Dashboard',
    meta: {
      breadcrumb: [
        {name: 'Dashboard', link: '/dashboard'}
      ],
      requiredLogin: true
    }
  },
  {
    path: '/users',
    name: 'Users List',
    view: 'users/Users',
    meta: {
      breadcrumb: [
        {name: 'Users', link: '/users'}
      ],
      requiredLogin: true
    }
  },
  {
    path: '/users/create',
    name: 'User Create',
    view: 'users/UserCreate',
    meta: {
      breadcrumb: [
        {name: 'Users', link: '/users'},
        {name: 'Create User', link: '/users/create'}
      ],
      requiredLogin: true
    }
  }
]
