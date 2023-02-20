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
    <swiper
:modules="modules"
navigation
:slidesPerView="'3'"
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
        <div>
            <Category :category="category" />

        </div>
      </SwiperSlide>
      </swiper>

  <div class="container mt-5 my-5">
      <div class="boxes">
       <a v-for="category in store.categories" :key="'category' + category.id" >
        <Category :category="category" />
        </a>
     </div>
    <button class="btn btn-outline-secondary m-auto d-flex p-3 text-uppercase">Ricerca per categorie</button>
  </div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
  .boxes {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 30px;
    a {
        text-decoration: none;
      }

  }
</style>
