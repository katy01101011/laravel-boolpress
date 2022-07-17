<template>
  <div>
    <AppHeader />
    <AllPosts />
  </div>
</template>

<script>
import AppHeader from '../components/AppHeader.vue';
import AllPosts from '../components/AllPosts.vue'

export default {
    name: 'App',
    components: {
        AllPosts,
        AppHeader,
    },
}
</script>

<style>

</style>