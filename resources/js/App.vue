<script>
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";
import {getLastSession} from './data/functions';

export default {
    name: "App",
    data(){
        return {
            getLastSession
        }
    },
    components: {
        AppHeader,
        AppFooter,
    },
    mounted(){
        this.getLastSession();
    }
};
</script>

<template>
    <AppHeader />
    <router-view> </router-view>
    <AppFooter />
</template>

<style lang="scss">

@use '../scss/appVue.scss';
</style>
