<script>
import {store} from '../../data/store'
export default {
    name: 'ListRestaurants',
    data() {
        return {
        store
      }
    }
}
</script>

<template>
    <div class="container my-5">
        <div v-if="store.filtered_rest.length" class="row">
            <div class="col my-3" v-for="restaurant in store.filtered_rest" :key="restaurant.slug">
                <div class="card card-lf m-auto">
                        <img :src="restaurant.cover_image" class="card-img-top" :alt="restaurant.name_of_restaurant">
                    <div class="card-body card-body-lf">
                        <h5 class="card-title fs-3 py-3 text-uppercase">{{ restaurant.name_of_restaurant }}</h5>
                        <span v-for="category in restaurant.categories" :key="category.slug" class="badge text-bg-dark mx-1 mb-1">{{category.name}}</span>
                        <p class="card-text fs-5">Indirizzo: {{ restaurant.address }}</p>
                        <p class="card-text fs-5">Numero: {{ restaurant.phone_number }}</p>
                        <!-- <p class="card-text">Piatti Disponibili: {{ restaurant.foods.length }}</p> -->
                            <router-link :to="{ name: 'detail', params: { slug: restaurant.slug } }" class="btn btn-outline-secondary mt-5 text-uppercase">Vai al ristorante</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="row">
            <div class="col my-3" v-for="restaurant in store.restaurants" :key="restaurant.slug">
                <div class="card card-lf m-auto">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body card-body-lf">
                        <h5 class="card-title fs-3 py-3 text-uppercase">{{ restaurant.name_of_restaurant }}</h5>
                        <span v-for="category in restaurant.categories" :key="category.slug" class="badge text-bg-dark mx-1 mb-1">{{category.name}}</span>
                        <p class="card-text fs-5">Indirizzo: {{ restaurant.address }}</p>
                        <p class="card-text fs-5">Numero: {{ restaurant.phone_number }}</p>
                        <!-- <p class="card-text">Piatti Disponibili: {{ restaurant.foods.length }}</p> -->
                            <router-link :to="{ name: 'detail', params: { slug: restaurant.slug } }" class="btn btn-outline-secondary mt-5 text-uppercase">Vai al ristorante</router-link>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<style lang="scss" scoped>
    .card-lf {
        width: 25rem;
        height: 380px;
        border: none;
    }

    .card-body-lf {
        background-color: #f6f6f6;
        border-radius: 10px;
        box-shadow: 1px 2px 2px rgba($color: #000000, $alpha: 0.1);
        padding: 15px 26px;
    }
</style>
