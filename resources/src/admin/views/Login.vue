<template>
    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form col-3" @submit="login">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Enter your credentials below</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="email" class="form-control" placeholder="Email"
                                       v-model="form.email"
                                       v-validate="'required|email'"
                                       name="email">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                                <span class="text-danger" v-show="errors.has('email')">{{errors.first('email')}}</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" placeholder="Password"
                                       v-model="form.password"
                                       v-validate="'required'"
                                       :error-messages="errors.collect('password')"
                                       name="password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <span class="text-danger" v-show="errors.has('password')">{{errors.first('password')}}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
</template>

<script>
  import {error} from 'admin/plugins/alert'

  export default {
    data() {
      return {
        image: '/images/bg-login.jpg',
        form: {
          email: null,
          password: null,
        }
      }
    },

    methods: {
      login(e) {
        e.preventDefault()
        this.$validator.validate().then(valid => {
          if (valid) {
            this.$http.post('login', this.form)
              .then(res => {
                if (!res.data.status) {
                  error(res.data.error.message)
                } else {
                  window.location = '/admin'
                }
              })
          }
        })
      }
    }
  }
</script>

<style lang="scss">
    @import '../styles/index.scss';

    .w80vh{
        width: 50vh;
    }

</style>

