<template>
    <div class="col-md-6">
        <b-card class="pb-3">
            <template #title>
                Create new user
            </template>
            <div class="col-md-12">
                <form @submit="onSubmit">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control"
                               v-validate="'required'"
                               :error-messages="errors.collect('name')"
                               v-model="user.name"
                               placeholder="Your name">
                        <span v-show="errors.has('name')" class="text-danger">{{errors.first('name')}}</span>
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control"
                               v-validate="'required|email'"
                               v-model="user.email"
                               placeholder="Your email">
                        <span v-show="errors.has('email')" class="text-danger">{{errors.first('email')}}</span>
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control"
                               v-validate="'required'"
                               ref="password"
                               v-model="user.password"
                               placeholder="Your password">
                        <span v-show="errors.has('password')" class="text-danger">{{errors.first('password')}}</span>
                    </div>

                    <div class="form-group">
                        <label>Password Confirmation:</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               v-validate="'required|confirmed:password'"
                               placeholder="Your confirmation password">
                        <span v-show="errors.has('password_confirmation')" class="text-danger">{{errors.first('password_confirmation')}}</span>
                    </div>

                    <div class="justify-content-between align-items-center">
                        <span v-show="isLoading"><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
                        <button type="submit" class="btn bg-blue float-right">Submit <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </b-card>
    </div>
</template>

<script>
  import {mapState} from 'vuex'

  export default {
    metaInfo() {
      return {
        title: 'Create User',
      }
    },
    data() {
      return {}
    },
    computed: {
      ...mapState('user', {user: 'user'}),
      ...mapState('app', {isLoading: 'isLoading'})
    },
    methods: {
      onSubmit(e) {
        e.preventDefault()
        this.$validator.validate().then(valid => {
          if (valid) {
            this.$store.dispatch('user/createUser', this.user)
          }
        })
      }
    }
  }
</script>
