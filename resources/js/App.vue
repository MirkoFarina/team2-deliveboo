<script>
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";
import { ApiService } from "./services/api.service";

export default {
    name: "App",
    components: {
        AppHeader,
        AppFooter,
    },
    data() {
        return {
        interval: null,
        /* time in ms */
        time: 10000,
        };
    },
    methods: {
        loadData() {
            ApiService.getApi("restaurants", null);
            ApiService.getApi("categories", null);
        },
    },
    mounted() {
        this.loadData();
    },
    created() {
        this.interval = setInterval(() => {
        this.loadData();
        }, this.time);
    },
    destroyed() {
        clearInterval(this.interval);
    },
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
