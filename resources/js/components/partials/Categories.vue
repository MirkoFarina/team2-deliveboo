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

    <div class="container-fluid pb-5">
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
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
</style>
