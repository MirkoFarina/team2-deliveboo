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
button, .button {
    background-color: #26635b;
    border: none;
    padding: 8px 10px;
    border-radius: 5px;
    color: white;
    transition: all .2s;
    text-decoration: none;
    &:hover {
        background-color: #b6e758;
        color: white;
    }
}
</style>
