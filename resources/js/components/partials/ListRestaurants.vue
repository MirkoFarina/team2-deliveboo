<script>
import { store } from '../../data/store'
import Paginator from './Paginator.vue'
import Card from './Card.vue';
export default {
    name: 'ListRestaurants',
    components: {Card, Paginator},
    data() {
        return {
        store,

        }
    },
    methods:{

    },
    mounted(){
    },

}
</script>

<template>
    <div class="container">
        <h2 class="text-uppercase fs-5 text-center pb-3 fw-bold">I nostri ristoranti</h2>
        <div v-if="store.filtered_rest.length" class="row">
            <div class="col my-3 d-flex justify-content-center" v-for="restaurant in store.restaurants_paginate" :key="restaurant.slug">
                <Card :restaurant="restaurant"/>
            </div>
        </div>

        <div class="py-5 text-center" v-else-if="store.filtered.length > 0 && store.filtered_rest.length == 0">
            <h3>Non ci sono risultati</h3>
        </div>

        <div v-else class="row ">
            <div class="col my-3 d-flex justify-content-center" v-for="restaurant in store.restaurants_paginate" :key="restaurant.slug">
                <Card :restaurant="restaurant"/>
            </div>
        </div>

        <Paginator v-if="!(store.filtered.length > 0 && store.filtered_rest.length == 0)" />
    </div>
</template>


<style lang="scss" scoped>
</style>
