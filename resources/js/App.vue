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
@use '../scss/partials/vars' as *;
main {
    min-height: 100vh;
}
button, .button {
    background-color: $secondary-color;
    border: none;
    padding: 8px 10px;
    border-radius: 5px;
    color: white;
    transition: all .2s;
    text-decoration: none;
    display: inline-block;
    &:hover {
        background-color: $primary-color;
        color: white;
    }
}
</style>
