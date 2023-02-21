<script>
import AppMain from '../components/AppMain.vue';
import {store} from '../data/store';
import { ApiService } from "../services/api.service";

export default {
    name: 'HomeApp',
    components:{
        AppMain,
    },
    data(){
        return{
            store,
        }
    },

    methods: {
        async callRes(){
            await ApiService.getApi('restaurants',{});
        }
    },
    mounted(){
        this.callRes();
    }

}
</script>

<template>
    <AppMain  />
</template>



<style lang="scss" scoped>
</style>
