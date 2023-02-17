<script>
import axios from 'axios'
import {store} from './data/store'
import {BASE_URL} from './data/data'
import AppHeader from './components/AppHeader.vue'
import AppFooter from './components/AppFooter.vue'
export default {
    name: 'App',
    components: {
        AppHeader,
        AppFooter,
    },
    data() {
        return {
            store
        }
    },
    methods: {
        getApi(){
            axios.get(BASE_URL + 'restaurants')
                .then(result => {
                    store.restaurants = result.data.restaurants;
                });
        }
    },
    mounted() {
       this.getApi();
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
