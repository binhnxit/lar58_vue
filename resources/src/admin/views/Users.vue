<template>
    <div>
        <!-- Basic tables title -->
        <div class="mb-3">
            <h6 class="mb-0 font-weight-semibold">
                Users list
            </h6>
            <span class="text-muted d-block">
            </span>
        </div>
        <!-- /basic tables title -->
        <b-card class="demo-loader">
            <template #title>
                Users List
            </template>
            <template #action>
                <a class="list-icons-item" data-action="reload" @click="reload"></a>
            </template>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in items">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.created_at}}</td>
                        <td>Action</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </b-card>
    </div>
</template>

<script>
  import {mapState} from 'vuex'

  export default {
    data() {
      return {
        headers: [
          {
            sortable: false,
            text: 'Name',
            value: 'name'
          },
          {
            sortable: false,
            text: 'Email',
            value: 'email'
          },
          {
            sortable: false,
            text: 'Created At',
            value: 'created_at'
          }
        ],
      }
    },

    computed: {
      ...mapState('user', {items: 'list'}),
      ...mapState('app', {isLoading: 'isLoading'}),
    },

    methods: {
      reload() {
        this.$store.dispatch('user/getListUsers')
      }
    },

    mounted() {

    },

    created() {
      this.$store.dispatch('user/getListUsers')
    },
  }
</script>
