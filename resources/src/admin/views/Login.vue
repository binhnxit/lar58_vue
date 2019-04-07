<template>
    <v-app>
        <v-img
                :src="image"
                height="100vh"
        >
            <v-container fill-height
                         fluid
                         grid-list-xl>
                <v-layout justify-center
                          wrap>

                    <v-flex xs12
                            md4>
                        <material-card color="green"
                                       title="Login"
                                       text="Login to Administrator system" class="bg-opacity">
                            <v-form @submit="login">
                                <v-container py-0>
                                    <v-layout wrap>
                                        <v-flex xs12 md12>
                                            <v-text-field label="Email"
                                                          v-model="form.email"
                                                          v-validate="'required|email'"
                                                          :error-messages="errors.collect('email')"
                                                          name="email"
                                                          class="success-input color-white"/>
                                        </v-flex>
                                        <v-flex xs12 md12>
                                            <v-text-field label="Password"
                                                          v-model="form.password"
                                                          v-validate="'required'"
                                                          :error-messages="errors.collect('password')"
                                                          name="password"
                                                          type="password"
                                                          class="success-input color-white"/>
                                        </v-flex>
                                        <v-flex xs12 md12>
                                            <v-checkbox label="Remember me"
                                                        class="color-white success-input"></v-checkbox>
                                        </v-flex>
                                        <v-flex xs12
                                                text-xs-right>
                                            <v-btn class="mx-0 font-weight-light"
                                                   type="submit"
                                                   color="success">
                                                Login
                                            </v-btn>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-form>
                        </material-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-img>
    </v-app>
</template>

<script>
  import Alert from '@/admin/plugins/alert'

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
                console.log(res)
                if (!res.data.status) {
                  Alert.fire(res.data.error.message, '', 'error')
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

    /* Remove in 1.2 */
    .v-datatable thead th.column.sortable i {
        vertical-align: unset;
    }

    .bg-opacity.v-sheet {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .color-white.v-input:not(.v-input--is-disabled) input {
        color: #fff;
    }

    .color-white .v-label {
        color: #fff;
    }

</style>

