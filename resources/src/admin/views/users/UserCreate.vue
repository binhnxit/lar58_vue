<template>
    <div class="col-md-6">
        <b-card class="pb-3">
            <template #title>
                {{$t('user.title_create')}}
            </template>
            <div class="col-md-12">
                <form @submit="onSubmit">
                    <div class="form-group">
                        <label>{{$t('user.label.first_name')}}</label>
                        <input type="text" name="first_name" class="form-control"
                               v-validate="'required'"
                               :error-messages="errors.collect('first_name')"
                               v-model="form.first_name"
                               :placeholder="$t('user.hint.first_name')">
                        <span v-show="errors.has('first_name')" class="text-danger">{{errors.first('first_name')}}</span>
                    </div>

                    <div class="form-group">
                        <label>{{$t('user.label.last_name')}}</label>
                        <input type="text" name="last_name" class="form-control"
                               v-validate="'required'"
                               :error-messages="errors.collect('last_name')"
                               v-model="form.last_name"
                               :placeholder="$t('user.hint.last_name')">
                        <span v-show="errors.has('last_name')" class="text-danger">{{errors.first('last_name')}}</span>
                    </div>

                    <div class="form-group">
                        <label>{{$t('user.label.email')}}</label>
                        <input type="email" name="email" class="form-control"
                               v-validate="'required|email|email_checked'"
                               v-model="form.email"
                               :placeholder="$t('user.hint.email')">
                        <span v-show="errors.has('email')" class="text-danger">{{errors.first('email')}}</span>
                    </div>

                    <div class="form-group">
                        <label>{{$t('user.label.password')}}</label>
                        <input type="password" name="password" class="form-control"
                               v-validate="'required'"
                               ref="password"
                               v-model="form.password"
                               :placeholder="$t('user.hint.password')">
                        <span v-show="errors.has('password')" class="text-danger">{{errors.first('password')}}</span>
                    </div>

                    <div class="form-group">
                        <label>{{$t('user.label.password_confirmation')}}</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               v-validate="'required|confirmed:password'"
                               v-model="form.password_confirmation"
                               :placeholder="$t('user.hint.password_confirmation')">
                        <span v-show="errors.has('password_confirmation')" class="text-danger">{{errors.first('password_confirmation')}}</span>
                    </div>

                    <div class="form-group">
                        <label>{{$t('user.label.avatar')}}</label>
                        <input type="file" name="avatar" class="form-control"
                               v-validate="'required'"
                               ref="file"
                               v-on:change="handleFileUpload()"
                               :placeholder="$t('user.hint.avatar')">
                        <span v-show="errors.has('avatar')" class="text-danger">{{errors.first('avatar')}}</span>
                    </div>

                    <div class="justify-content-between align-items-center">
                        <span v-show="isLoading"><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
                        <button type="submit" class="btn bg-blue float-right">{{$t('btn.submit')}} <i
                                class="icon-paperplane ml-2"></i></button>
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
      return {
        form: {
          first_name: null,
          last_name: null,
          email: null,
          password: null,
          password_confirmation: null,
          avatar: '',
        }
      }
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
            this.$store.dispatch('user/createUser', this.form)
          }
        })
      },

      handleFileUpload() {
        this.form.avatar = this.$refs.file.files[0];
      }
    }
  }
</script>
