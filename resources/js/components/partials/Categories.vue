<script>
import Category from './Category.vue'
import { store } from '../../data/store';
import { ApiService } from "../../services/api.service";
import {Swiper, SwiperSlide} from 'swiper/vue';
import {Navigation, Pagination} from 'swiper';
import 'swiper/css/bundle';



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
            swiperOptions: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                465: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                770: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                1056: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
            }
        }
    },
    methods:{
        async callRes(){
            await ApiService.getApi('categories','');
        }
    },
    mounted(){
        this.callRes();
    },

    setup () {
        return {
            modules:[Navigation, Pagination]
        }
    },
}
</script>

<template>
<div class="wave">
    <svg class="wave-1hkxOo" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none"><path class="wavePath-haxJK1 animationPaused-2hZ4IO" d="M826.337463,25.5396311 C670.970254,58.655965 603.696181,68.7870267 447.802481,35.1443383 C293.342778,1.81111414 137.33377,1.81111414 0,1.81111414 L0,150 L1920,150 L1920,1.81111414 C1739.53523,-16.6853983 1679.86404,73.1607868 1389.7826,37.4859505 C1099.70117,1.81111414 981.704672,-7.57670281 826.337463,25.5396311 Z" fill="currentColor"></path></svg>
</div>
<section id="categories">
    <div class="container-fluid pb-5 slider-container">
        <h2 class="text-center text-uppercase font-bold fs-4 mb-4">Seleziona una o più categorie qui sotto <span>&#128071;</span></h2>
            <swiper
                :modules="modules"
                navigation
                :slidesPerView="'4'"
                :effect="'coverflow'"
                :breakpoints="swiperOptions"
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
     <div class="container mobile-view-container">
        <div class="row">
            <div class="col-6 my-2" v-for="category in store.categories" :key="'category' + category.id">
                <SwiperSlide>
                    <Category :category="category" />
                </SwiperSlide>
            </div>
        </div>
     </div>

</section>
<div class="wave down">
            <svg class="wave-1hkxOo" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none"><path class="wavePath-haxJK1 animationPaused-2hZ4IO" d="M826.337463,25.5396311 C670.970254,58.655965 603.696181,68.7870267 447.802481,35.1443383 C293.342778,1.81111414 137.33377,1.81111414 0,1.81111414 L0,150 L1920,150 L1920,1.81111414 C1739.53523,-16.6853983 1679.86404,73.1607868 1389.7826,37.4859505 C1099.70117,1.81111414 981.704672,-7.57670281 826.337463,25.5396311 Z" fill="currentColor"></path></svg>
</div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';

    // **********MEDIA***********

@media screen and (max-width: 770px){
    .slider-container{
        display: none;
    }
    .mobile-view-container{
        display: block;
    }
}
</style>
