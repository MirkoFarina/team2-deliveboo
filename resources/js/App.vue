<script>
import AppHeader from './components/AppHeader.vue'
import AppFooter from './components/AppFooter.vue'
import { ApiService } from './services/api.service'

export default {
    name: 'App',
    components: {
        AppHeader,
        AppFooter,
    },
    data() {
        return {
        }
    },
    methods: {},
    mounted() {
        ApiService.getApi('restaurants', null);
    }
}
</script>

<template>
    <AppHeader />
    <router-view> </router-view>
    <AppFooter />
</template>

<style lang="scss">
@use '../scss/appVue.scss'
</style>
