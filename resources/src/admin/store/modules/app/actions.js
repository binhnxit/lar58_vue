import client from '@/admin/plugins/axios'
import router from '@/admin/router'

export default {
  onLogout({commit}) {
    client.get('logout')
      .then(res => {
        console.log(res)
        router.push('/admin')
        window.location.reload()
      })

  }
}