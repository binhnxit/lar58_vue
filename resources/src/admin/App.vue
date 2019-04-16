<template>
    <div>
        <!-- Main navbar -->
        <core-navbar/>
        <!-- /main navbar -->

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <core-sidebar/>
            <!-- /main sidebar -->

            <!-- Main content -->
            <div class="content-wrapper">

                <core-view/>

                <!-- Footer -->
                <core-footer/>
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
      ...mapState('app', {isLoading: 'isLoading'})
    },

    watch: {
      isLoading: (val) => {
        if (val) {
          NProgress.start()
        } else {
          NProgress.done()
        }
      }
    }
  }
</script>

<style lang="scss">
    @import './styles/index.scss';
</style>
