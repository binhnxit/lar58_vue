<template>
    <div>
        <!-- Main navbar -->
        <core-navbar v-if="authenticated"/>
        <!-- /main navbar -->

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <core-sidebar v-if="authenticated"/>
            <!-- /main sidebar -->

            <!-- Main content -->
            <div class="content-wrapper">


                <core-view v-if="authenticated"/>

                <core-login v-else="authenticated"/>

                <!-- Footer -->
                <core-footer v-if="authenticated"/>
                <!-- /footer -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->
    </div>
</template>

<script>
  import {mapState} from 'vuex'

  export default {
    computed: {
      ...mapState('app', {isLoading: 'isLoading', authenticated: 'authenticated'})
    },
  }
</script>

<style lang="scss">
    @import './styles/index.scss';
</style>
