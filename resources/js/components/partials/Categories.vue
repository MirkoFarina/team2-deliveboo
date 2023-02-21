<script>
import Category from './Category.vue'
import { store } from '../../data/store';

import {Swiper, SwiperSlide} from 'swiper/vue';
import {Navigation, Pagination} from 'swiper';
import 'swiper/css/bundle';

// import axios from 'axios';
// import { BASE_URL } from '../../data/data';

export default {
  name: 'Categories',
  components: {
        Swiper,
        SwiperSlide,
        Category
    },
  data(){
    return{
        store,
    }
    },
    setup () {
        return {
            modules:[Navigation, Pagination]
        }
    },
}
</script>

<template>

    <div class="container-fluid my-5">
        <h2 class="text-center text-uppercase fs-4 my-4 mb-5">Scegli tra le nostre categorie</h2>
            <swiper
                :modules="modules"
                navigation
                :slidesPerView="'4'"
                :effect="'coverflow'"
                :pagination="{clickable: true }"
                :coverflowEffect="{
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            }">

            <SwiperSlide  v-for="category in store.categories" :key="'category' + category.id">
                    <Category :category="category" />
            </SwiperSlide>

            </swiper>

     </div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
</style>
