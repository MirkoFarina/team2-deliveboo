<script>
import { store } from '../data/store';
import { ApiService } from "../services/api.service";
import CardMenu from '../components/partials/CardMenu.vue';

export default {
    name: 'RestaurantsDetais',
    components: {CardMenu},
    data() {
        return {
            restaurant: {},
            slug: this.$route.params.slug,
            store,
        }
    },
    methods: {
        async callRes(){
            this.restaurant = (await ApiService.getApi('restaurants/' + this.$route.params.slug ,''))[0];
            console.log('res',this.restaurant );
        }
    },
    mounted() {
        this.callRes();
        store.filtered_rest = [];
        store.filtered = [];
    },
}
</script>

<template>
    <div class="overlay-2" v-if="restaurant">
        <div class="box-image mb-5">
            <div class="overlay">

                <div class="container text-center d-flex flex-column justify-content-center align-items-center h-100 gap-3">
                    <h2 class="text-light display-1">{{restaurant.name_of_restaurant}}</h2>
                    <h3 class="text-light display-5">{{restaurant.address}}</h3>
                    <h3 class="text-light display-6"> <i class="fa-solid fa-phone mx-3"></i> {{restaurant.phone_number}}</h3>
                </div>
            </div>
            <img :src="restaurant.cover_image" :alt="restaurant.name_of_restaurant">
        </div>
        <div class="container">
            <h1 class="text-center text-white text-uppercase fs-3 pb-5">Menu</h1>

            <div v-if="restaurant.foods" class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 my-3" v-for="food in restaurant.foods" :key="food.id">
                    <CardMenu :food="food"  />
                </div>
            </div>
        </div>
    </div>
    <h2 v-else class="text-center py-3">Ops. Qualcosa è andato storto :(</h2>
</template>

<style lang="scss" scoped>
@use '../../scss/partials/vars' as *;
.box-image {
        height: 500px;
        position: relative;

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: fixed;
            z-index: -10;
        }

        .overlay{
            width: 100%;
            height: 100%;
            position: absolute;
        }
    }
    .overlay-2 {
        background-color: rgba(0,0,0,.9);
}
</style>





