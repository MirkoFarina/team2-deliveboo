<script>
import {store} from '../data/store';
export default {
    name: "AppHeader",
    data(){
        return {
            store,
            is_canvas: false
        }
    }
};
</script>

<template>
    <header>
        <div class="img">
            <router-link :to="{ name: 'home' }"
                ><img src="../assets/img/logoboo.png" alt="logo"
            /></router-link>
        </div>

        <div class="btn">
            <div>
                <button @click="is_canvas = !is_canvas" class="mx-3 text-light dropbtn">
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
                <div class="mf-offcanvas p-4" :class="{active : is_canvas}">
                    <div class="text-end">
                        <i @click="is_canvas = false" class="fa-solid fa-xmark"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center flex-column w-50" v-if="store.shopping_cart.length">
                            <div class="container">
                                <div v-for="(food, index) in store.shopping_cart" :key="index + 'piatto'" class="row">
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
            <div class="dropdown">
                <button class="dropbtn">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="dropdown-content">
                    <a href="/admin"> Login </a>
                    <a href="/register"> Register </a>

                </div>
            </div>
        </div>
    </header>
</template>

<style lang="scss" scoped>
header {
    height: 100px;
    width: 100%;
    align-items: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #F6F6F6;

    img {
        width: 80px;
        margin: 10px;
    }

    .row {
        background-color: black;
        border-radius: 20px;
        color: #25645B;
    }
    .btn {
        border: none;
        display: flex;
        align-items: center;
        margin-right: 30px;
    }
    .btn-plus {
        margin-right: 100px;
    }

    button {
        background-color: #e9e9e9;
        padding: 10px;
        border-radius: 12px;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        font-size: 13px;

        a {
            text-decoration: none;
            color: black;
        }
    }
    button:hover {
        background-color: #46e3cd;
    }
    button:active {
        transform: translateY(2px);
    }

    .dropbtn {
        background-color: #25645B;
        color: white;
        padding: 10px;
        font-size: 13px;
        border: none;
        cursor: pointer;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        opacity: 0.9;
        right: 8px;
        right: -25px;
        left: -25px;
    }
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown:hover .dropbtn {
        background-color: #46e3cd;
    }

    .mf-offcanvas {
        position: fixed;
        z-index: 99;
        display: block;
        top: 0;
        left: -100%;
        height: 70vh;
        width: 60vw;
        background-color: #25645B;
        padding: 10px;
        transition: all 0.55s;
        &.active {
            display: block;
            left: 0;
        }
    }
}
</style>
