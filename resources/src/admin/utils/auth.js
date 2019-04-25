import {TOKEN_KEY, TOKEN_TYPE} from 'admin/utils/constants'


let getToken = () => {
  let token = localStorage.getItem(TOKEN_KEY)
  let type = localStorage.getItem(TOKEN_TYPE)

  return token ? `${type} ${token}` : ''
}

export {getToken}