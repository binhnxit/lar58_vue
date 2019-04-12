<template>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">
                <slot name="title"></slot>
            </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <slot name="action"></slot>
                </div>
            </div>
        </div>

        <div class="card-body">
            <slot name="description"></slot>
        </div>

        <slot></slot>
    </div>
</template>

<script>
  export default {
    name: "b-card"
  }
</script>

<style scoped>

</style>