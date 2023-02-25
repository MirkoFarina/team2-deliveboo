<script>
import {store} from '../../data/store';
import {modQuantityCart, deleteCart, removeFood} from '../../data/functions';
export default {
    name: 'ShoppingCart',
    data(){
        return {
            store,
            modQuantityCart,
            deleteCart,
            removeFood,
        }
    },
}
</script>

<template>
<div>
    <div v-show="store.shopping_cart.foods.length !== 0" class="item-counter">{{ store.shopping_cart.foods.length}}</div>
    <button @click="store.is_canvas = !store.is_canvas" class="mx-3 text-light dropbtn">
        <i class="fa-solid fa-cart-shopping"></i>
    </button>
    <div class="mf-offcanvas" :class="{active : store.is_canvas}">
        <div class="text-end">
            <i @click="store.is_canvas = false" class="fa-solid fa-circle-xmark p-3"></i>
        </div>
        <div class="h-100">
            <h3 class="mb-2 fs-4 bg-dark">
                IL TUO CARRELLO
            </h3>
            <div class="h-100 " v-if="store.shopping_cart.foods.length">
                <div class="container content-order">
                    <div v-for="(food, index) in store.shopping_cart.foods" :key="index + 'piatto'" class="row mb-3">
                        <div class="col-5 col-12">
                            <div>
                                {{ food.quantity }} x {{food.name}}
                            </div>
                        </div>
                        <div class="col-5 col-12 text-center my-2">
                            <div>
                                +{{ food.price }} &euro;
                            </div>
                        </div>
                        <div class="col-5 col-12 my-btns d-flex justify-content-center">
                            <a @click="modQuantityCart(false, food)" class="btn btn-primary mx-1"><i class="fa-solid fa-minus"></i></a>
                            <a @click="modQuantityCart(true, food)" class="btn btn-primary mx-1"><i class="fa-solid fa-plus"></i></a>
                            <a @click="removeFood(food)" class="btn btn-danger mx-1"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                <div class="total">
                    TOTALE: {{ store.shopping_cart.total_amount }} &euro;
                </div>
                <div class="d-flex justify-content-center my-2">
                    <router-link :to="{name: 'payment'}" class="btn btn-success mx-1">Pagamento</router-link>
                    <a @click="deleteCart" class="btn btn-danger mx-1">Svuota</a>
                </div>
            </div>
            <div class="mt-5" v-else>
                <h5 class="fs-6 text-warning">
                    IL TUO CARRELLO &Eacute; VUOTO...<br>
                    PROVA A FARE QUALCHE ACQUISTO
                </h5>
            </div>
        </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
    .mf-offcanvas {
        position: fixed;
        z-index: 99;
        display: block;
        bottom: 0;
        left: -100%;
        height: 60%;
        width: 300px;
        background-color: #696969da;
        transition: all 0.55s;
        border-bottom-right-radius: 10px;
        border-top-right-radius: 10px;
        color: white;
        &.active {
            display: block;
            left: 0;
        }
        .content-order {
            height: calc(100% - 25vh);
            overflow-y: auto;
        }
        .total {
            background-color: #5c5c5c;
            margin: 0 auto;
        }
    }
    button {
        background-color: #25645B;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        font-size: 13px;
        position: relative;
    }
    button:hover {
        background-color: #46e3cd;
    }
    button:active {
        transform: translateY(2px);
    }
    .item-counter {
        height: 22px;
        width: 22px;
        background-color: #525252e2;
        position: absolute;
        right: 88px;
        top: 17px;
        z-index: 999;
        border-radius: 40%;
        color: white;
        line-height: 20px;
        font-size: 0.9rem;
    }
    .btn {
        border: none;
        display: flex;
        align-items: center;
    }


    // @media screen and (max-width: 600px) {
    //     .mf-offcanvas {
    //         width: 80vw;
    //     }
    // }
</style>
