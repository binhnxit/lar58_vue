import VeeValidate from 'vee-validate'
import client from './axios'
import Vue from "vue";

Vue.use(VeeValidate)

/**
 * A validate rule check email is duplicated
 */
VeeValidate.Validator.extend('email_checked', {
  getMessage: field => `The ${field} is duplicated, please input other email address`,
  validate: (value) => {
    let params = {params: {email: value}}
    return client.get('users/check-email', params)
      .then(res => {
        return !res.data.data
      })
      .catch(err => {
        console.log(err)
        return true
      })
  }
})