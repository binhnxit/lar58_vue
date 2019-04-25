<template>
    <transition name="page" mode="out-in">
        <router-view/>
    </transition>
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
  }
</script>

<style>
    #core-view {
        padding-bottom: 100px;
    }
</style>
