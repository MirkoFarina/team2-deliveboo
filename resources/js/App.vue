<script>
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";
import ModalCart from './components/partials/ModalCart.vue';
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
        ModalCart
    },
    mounted(){
        this.getLastSession();
    }
};
</script>

<template>
    <AppHeader />
    <main>
        <router-view> </router-view>
    </main>
    <ModalCart />
    <AppFooter />
</template>

<style lang="scss">
@use '../scss/appVue.scss';
main {
    min-height: 100vh;
}
</style>
