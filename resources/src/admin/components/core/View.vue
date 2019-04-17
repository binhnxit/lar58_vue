<template>
    <div>
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">{{titleHeader}}</span></h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <!--<div class="header-elements">-->
                <!--<div class="d-flex justify-content-center">-->
                <!--<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">-->
                <!--<i class="icon-bars-alt text-pink-300"></i>-->
                <!--<span>Statistics</span>-->
                <!--</a>-->
                <!--<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">-->
                <!--<i class="icon-calculator text-pink-300"></i>-->
                <!--<span>Invoices</span>-->
                <!--</a>-->
                <!--<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">-->
                <!--<i class="icon-calendar5 text-pink-300"></i>-->
                <!--<span>Schedule</span>-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->
            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <router-link v-for="(breadcrumb, idx) in breadcrumbList" class="breadcrumb-item"
                                     :to="breadcrumb.link"
                                     :key="idx">
                            <i class="icon-home2 mr-2" v-show="idx === 0"></i>
                            {{breadcrumb.name}}
                        </router-link>
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    <div class="breadcrumb justify-content-center">
                        <a href="#" class="breadcrumb-elements-item">
                            <i class="icon-comment-discussion mr-2"></i>
                            Support
                        </a>

                        <div class="breadcrumb-elements-item dropdown p-0">
                            <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear mr-2"></i>
                                Settings
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account
                                    security</a>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                                <a href="#" class="dropdown-item"><i class="icon-accessibility"></i>
                                    Accessibility</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content">
            <transition name="page" mode="out-in">
                <router-view/>
            </transition>
        </div>
        <!-- /content area -->
    </div>
</template>

<script>
  export default {
    metaInfo() {
      return {
        title: 'Admin Lar58Vue'
      }
    },

    data() {
      return {
        titleHeader: null,
        breadcrumbList: [],
      }
    },

    watch: {
      '$route'(val) {
        this.titleHeader = val.name
        this.breadcrumbList = val.meta.breadcrumb
      }
    },
  }
</script>

<style>
    #core-view {
        padding-bottom: 100px;
    }
</style>
