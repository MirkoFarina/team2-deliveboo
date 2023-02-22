<script>
import {store} from '../../data/store';
export default {
    name: 'ShoppingCart',
    data(){
        return {
            store
        }
    }
}
</script>

<template>
<div>
    <button @click="store.is_canvas = !store.is_canvas" class="mx-3 text-light dropbtn">
        <i class="fa-solid fa-cart-shopping"></i>
    </button>
    <div class="mf-offcanvas px-3 py-5" :class="{active : store.is_canvas}">
        <div class="text-end">
            <i @click="store.is_canvas = false" class="fa-solid fa-xmark"></i>
        </div>
        <div class="h-100 d-flex flex-column justify-content-center align-items-center">
            <h3>
                IL TUO CARRELLO
            </h3>
            <div class="h-100 d-flex align-items-center  flex-column w-50" v-if="store.shopping_cart.foods.length">
                <div class="container content-order">
                    <div v-for="(food, index) in store.shopping_cart.foods" :key="index + 'piatto'" class="row my-3">
                        <div class="col-6">
                            <p>
                                {{ food.quantity }}x {{food.name}}
                            </p>
                        </div>
                        <div class="col-6 d-flex">
                            <p>
                                +{{ food.price }} &euro;
                            </p>
                        </div>
                    </div>
                </div>
                <div class="total mb-3">
                    TOTALE: {{ store.shopping_cart.total_amount }} &euro;
                </div>
                <div>
                    <button>PAGA</button>
                </div>
            </div>
            <div class="mt-5" v-else>
                <h5>
                    IL TUO CARRELLO &Eacute; VUOTO <br>
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
        top: 0;
        left: -100%;
        height: 60vh;
        width: 40vw;
        background-color: #25645B;
        padding: 10px;
        transition: all 0.55s;
        border-bottom-right-radius: 10px;
        &.active {
            display: block;
            left: 0;
        }
        .content-order {
            height: calc(100% - 20vh);
            overflow-y: auto;
        }
    }
    button {
        background-color: #25645B;
        padding: 10px;
        border-radius: 12px;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        font-size: 13px;
    }
    button:hover {
        background-color: #46e3cd;
    }
    button:active {
        transform: translateY(2px);
    }
    .btn {
        border: none;
        display: flex;
        align-items: center;
        margin-right: 30px;
    }
</style>
