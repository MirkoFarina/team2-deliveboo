<script>
import {store} from '../../data/store';
import {addToCart} from '../../data/functions';
export default {
    name: 'Card',
    props: {
        food: Object,
    },
    data(){
        return {
            store
        }
    },
    methods:
    {
        pushIntoCart(food){
            addToCart(food);
            store.is_canvas = true;
        }
    }
}
</script>

<template>
    <!-- <div class="card card-lf">
        <div class="card-body card-body-lf">
            <div class="box">
                <div class="logo">
                    <img :src="food.cover_image" class="card-img-top" :alt="food.name">
                </div>
                <div class="info">
                    <h5 class="card-title fs-4 mb-4 text-uppercase">{{ food.name }}</h5>
                    <p class="card-text fs-6 m-0 mt-2">Ingredienti: {{ food.ingredients }}</p>
                    <p class="card-text fs-5 mt-3">&euro; {{ food.price }}</p>
                     <div class="text-uppercase available">
                        <p v-if="food.is_available === 1">Disponibile</p>
                        <p class="text-danger" v-else>Al momento Non Disponibile</p>
                     </div>
                </div>
            </div>
            <div class="addtocard text-center">
                 <button @click="pushIntoCart(food)" v-if="food.is_available" class=" m-2 ">Aggiungi al carrello</button>
            </div>
        </div>
    </div> -->
                <div class="food-card ">
                    <div class="food-card_img">
                        <img :src="food.cover_image" alt="">
                    </div>
                    <div class="food-card_content">
                        <div class="food-card_title-section">
                            <a href="#!" class="food-card_title">{{ food.name }}</a>
                        </div>
                        <div class="food-card_bottom-section">
                            <div class="space-between">
                                <div style="height: 5rem;">
                                    <p v-if="food.is_available === 1" class="text-success">Disponibile</p>
                                    <p class="text-danger" v-else>Al momento Non Disponibile</p>
                                    <span class="fa-solid fa-burger"></span> {{food.ingredients}}
                                </div>
                                <div class="pull-right">
                                    <span class="badge badge-success"></span>
                                </div>
                            </div>
                            <hr>
                            <div class="space-between">
                                <div class="food-card_price">
                                    <span class="text-success">&euro; {{ food.price }}</span>
                                </div>
                                <div class="food-card_order-count">
                                    <!-- COUNT DA ELIMINARE E AGGIUNGERE BOTTONE "ADD TO CART" -->
                                    <div class="input-group mb-3">
                                        <button  @click="pushIntoCart(food)" v-if="food.is_available" class="">
                                            <i class="fa-solid fa-cart-plus"></i> Aggiungi
                                        </button>
                                        <button class="btn btn-secondary" v-else="food.is_available === false" disabled>
                                            <i class="fa-solid fa-cart-plus"></i> Aggiungi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/guest/foodCards.scss';
.card-lf {
    width: 600px;
    height: 350px;
    margin-bottom: 50px;
    border: none;
    background-color: #f9f8f8;
    padding: 10px;
    box-shadow: 1px 2px 2px rgba($color: #000000, $alpha: 0.1);
    padding: 10px 15px;
    transition: all .2s;
    &:hover {
        transform: scale(1.1);
    }
    .available {
        p {
            color: green;
        }
    }
}

.card-body-lf {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    .box {
        display: flex;
        justify-content: space-around;

        .logo {
            width: 40%;

            img {
                object-fit: contain;
                height: 100%;
                width: 100%;
            }
        }

        .info {
            width: 50%;
        }
    }
}

    // **********MEDIA***********


        @media screen and (max-width: 1200px) {
        .card-lf {
            margin: 0 auto;
            margin-bottom: 50px;
            .card-body-lf {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            .box {
                height: 70%;
            }
            .button {
                height: 20%;
            }
        }
    }
}




    @media screen and (max-width: 760px) {
    .btn-query {
        width: 100%;
        margin-top: 10px;
    }
           .card-lf {
        width: 50%;
        min-width: 300px;
        height: 530px;
        padding: 10px;
        align-items: center;
        margin: 0 auto;
    }
           .card-body-lf {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        .box {
            display: block;
            .logo {
                width: 100%;
            }
            .info {
                margin: 0;
                width: 100%;
            }
        }
    }
}
</style>

