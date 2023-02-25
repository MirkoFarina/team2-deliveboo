<script>
import { store } from '../data/store';
import ShoppingCart from './partials/ShoppingCart.vue';
export default {
    name: "AppHeader",
    components:
    {
        ShoppingCart
    },
    data(){
        return {
            store
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
            <span v-if="store.show_cart">
                <ShoppingCart />
            </span>
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
    background-color: #FFFFFF;

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
        border-radius: 8px;
        width: 40px;
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
        z-index: 10;

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


}
</style>
