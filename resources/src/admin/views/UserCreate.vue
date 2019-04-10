<template>
    <v-container
            fill-height
            fluid
            grid-list-xl>
        <v-layout wrap justify-center>
            <v-flex xs12 md8>
                <material-card color="green"
                               title="Create User"
                               text="Please fill your information and press save button" class="bg-opacity">
                    <v-form autocomplete="off" @submit="onSubmit">
                        <v-container py-0>
                            <v-layout wrap>
                                <v-flex xs12 md12>
                                    <v-text-field label="Name"
                                                  v-model="user.name"
                                                  v-validate="'required'"
                                                  :error-messages="errors.collect('name')"
                                                  name="name"
                                                  autocomplete="false"
                                                  class="success-input"/>
                                </v-flex>
                                <v-flex xs12 md12>
                                    <v-text-field label="Email"
                                                  v-model="user.email"
                                                  v-validate="'required|email'"
                                                  :error-messages="errors.collect('email')"
                                                  name="email"
                                                  autocomplete="off"
                                                  class="success-input"/>
                                </v-flex>
                                <v-flex xs12 md12>
                                    <v-text-field label="Password"
                                                  v-model="user.password"
                                                  v-validate="'required'"
                                                  data-vv-as="password"
                                                  ref="password"
                                                  :error-messages="errors.collect('password')"
                                                  name="password"
                                                  type="password"
                                                  class="success-input"/>
                                </v-flex>
                                <v-flex xs12 md12>
                                    <v-text-field label="Password Confirmation"
                                                  v-model="user.password_confirmation"
                                                  v-validate="'required|confirmed:password'"
                                                  data-vv-as="password_confirmation"
                                                  name="password_confirmation"
                                                  :error-messages="errors.collect('password_confirmation')"
                                                  type="password"
                                                  class="success-input"/>
                                </v-flex>
                                <v-flex xs12
                                        text-xs-right>
                                    <v-btn class="mx-0 font-weight-light"
                                           type="submit"
                                           color="success">
                                        Save
                                    </v-btn>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-form>
                </material-card>
            </v-flex>
        </v-layout>
    </v-container>
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
      ...mapState('user', {user: 'user'})
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
