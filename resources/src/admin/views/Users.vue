<template>
    <v-container
            fill-height
            fluid
            grid-list-xl>
        <v-layout wrap>
            <v-flex md12>
                <router-link :to="{path: '/users/create'}">
                    <v-btn fab dark color="indigo">
                        <v-icon dark>fa-plus-circle</v-icon>
                    </v-btn>
                </router-link>
            </v-flex>
            <v-flex md12>
                <material-card color="green"
                               flat
                               full-width
                               title="Users list"
                               text="Users for ....">
                    <v-data-table :headers="headers"
                                  :items="items"
                                  hide-actions>
                        <template slot="headerCell" slot-scope="{ header }">
                            <span class="subheading font-weight-light text--darken-3" v-text="header.text"/>
                        </template>
                        <template slot="items" slot-scope="{ item }">
                            <td>{{ item.name }}</td>
                            <td>{{ item.email }}</td>
                            <td>{{ item.created_at }}</td>
                        </template>
                    </v-data-table>
                </material-card>
            </v-flex>
        </v-layout>
    </v-container>
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
      ...mapState('user', {items: 'list'})
    },
    methods: {
    },
    created() {
      this.$store.dispatch('user/getListUsers')
    },
  }
</script>
