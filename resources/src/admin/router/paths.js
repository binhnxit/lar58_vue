/**
 * Define all of your application routes here
 * for more information on routes, see the
 * official documentation https://router.vuejs.org/en/
 */
export default [
  {
    path: '/dashboard',
    // Relative to /admin/views
    name: 'Dashboard',
    view: 'Dashboard'
  },
  {
    path: '/users',
    name: 'Users List',
    view: 'Users'
  },
  {
    path: '/tables',
    name: 'Tables Page',
    view: 'Tables'
  },
  {
    path: '/users/create',
    name: 'User Create',
    view: 'UserCreate'
  }
]
