<template>
    <div>
        <!-- Main navbar -->
        <core-navbar />
        <!-- /main navbar -->

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <core-sidebar />
            <!-- /main sidebar -->

            <!-- Main content -->
            <div class="content-wrapper">

                <core-view />

                <!-- Footer -->
                <core-footer />
                <!-- /footer -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->
    </div>
</template>

<style lang="scss">
    @import './styles/index.scss';
</style>
