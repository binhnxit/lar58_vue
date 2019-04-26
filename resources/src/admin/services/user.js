import client from 'admin/plugins/axios'

export default {
  create: (params) => {
    let formData = new FormData()
    _.forEach(params, (item, key) => {
      formData.append(key, item)
    })
    return client.post('users', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
  },

  list: () => {
    return client.get('users')
  }
}