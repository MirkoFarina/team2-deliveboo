<script>
import {Swiper, SwiperSlide} from 'swiper/vue';
import {Navigation, Pagination} from 'swiper';
import {modQuantityCart, removeFood} from '../../data/functions';
import 'swiper/css/bundle';
export default {
    name: 'SliderCart',
    props: {
        cart: Object
    },
    components: {
        Swiper,
        SwiperSlide,
    },
    data(){
        return{
            modQuantityCart,
            removeFood,
            swiperOptions: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                465: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                1056: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
            }
        }
    },
    setup () {
        return {
            modules:[Navigation, Pagination]
        }
    }
}
</script>


<template>
    <swiper
                :modules="modules"
                navigation
                :slidesPerView="'3'"
                :effect="'coverflow'"
                :breakpoints="swiperOptions"
                :coverflowEffect="{
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            }">
                <SwiperSlide v-for="food in cart.foods" :key="food + 'index'" >
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> {{ food['name'] }}</h5>
                            <p class="card-text">
                               QUANTIT&Agrave; : {{  food['quantity'] }}
                            </p>
                            <p class="card-text">
                               PREZZO PER ARTICOLO : {{  food['price'] }}&euro;
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a @click="modQuantityCart(false, food)" class="btn btn-primary mx-1"><i class="fa-solid fa-minus"></i></a>
                                <a @click="modQuantityCart(true, food)" class="btn btn-primary mx-1"><i class="fa-solid fa-plus"></i></a>
                                <a @click="removeFood(food)" class="btn btn-danger mx-1"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </SwiperSlide>
            </swiper>
            <div class="text-center mt-5 text-success">
                <h3 v-if="cart.foods.length !== 0">
                    TOTALE : {{ cart.total_amount }} &euro;
                </h3>
            </div>
</template>


<style lang="scss" scoped>

</style>
