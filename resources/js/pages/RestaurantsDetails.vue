<script>
import { searchSlugRecord } from '../data/functions'
import { store } from '../data/store';
export default {
    name: 'RestaurantsDetais',
    data() {
        return {
            restaurant: {}
        }
    },
    methods: {
    },
    mounted() {
        this.restaurant = searchSlugRecord(store.restaurants,this.$route.params.slug );
    }
}
</script>

<template>
    <div v-if="restaurant" class="container">
        <img :src="restaurant.cover_image" :alt="restaurant.name_of_restaurant">
        <div class="box-description container-fluid my-5">
            <h2>{{ restaurant.name_of_restaurant }}</h2>
            <p>Indirizzo: {{ restaurant.address }}</p>
            <p>Tel: {{ restaurant.phone_number }}</p>
            <p>Website: <a :href="restaurant.website">{{ restaurant.website }}</a></p>
            <p>p.iva: {{ restaurant.p_iva }}</p>
        </div>

        <h1 class="text-center text-uppercase">Menu</h1>

        <div v-if="restaurant.foods" class="row">
            <div class="col" v-for="food in restaurant.foods" :key="food.id">
                <div class="card card-lf container-lf my-5 d-flex" style="width: 20rem;">
                    <img :src="food.cover_image" class="card-img-top" :alt="food.name">
                    <div class="card-body">
                        <p>{{ food.name }}</p>
                        <p>{{ food.ingredients }}</p>
                        <p class="card-text">Ingredienti: {{ food.ingredients }}</p>
                        <p>&euro; {{ food.price }}</p>
                        <div>
                        <p v-if="food.is_available === 1">Disponibile</p>
                        <p v-else>Non Disponibile</p>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary m-2"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 v-else class="text-center py-3">Ops. Qualcosa è andato storto :(</h2>
</template>

<style lang="scss" scoped>
@use '../../scss/partials/vars' as *;
    .box-description {
        border: 1px solid $gray-border;
        padding: 20px 25px;
        background-color: #f6f6f6;
        border-radius: 8px;
        box-shadow: 1px 2px 2px rgba($color: #000000, $alpha: 0.1);
    }
    .card-lf {
        background-color: #fcfcfc;
        height: 400px;
        border-radius: 8px;
        padding: 10px 15px;
        box-shadow: 1px 2px 2px rgba($color: #000000, $alpha: 0.1);
    }
</style>





