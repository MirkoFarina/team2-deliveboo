<script>
import SliderCart from '../components/partials/SliderCart.vue';
import {store} from '../data/store'
import {ApiService} from '../services/api.service';
export default {
    name: "Payment",
    token: "",
    components: {
        SliderCart
    },
    data() {
        return {
            ApiService,
            store,
            cart        : null,
            checkCart   : true,
            checkData   : false,
            checkPayment: false
        };
    },
    methods: {
        getPayment() {
        const form = document.getElementById("payment-form");

        braintree.dropin
            .create({
            authorization: this.token,
            container: "#dropin-container",

            })
            .then((dropinInstance) => {
            form.addEventListener("submit", (event) => {
                event.preventDefault();
                dropinInstance
                .requestPaymentMethod()
                .then((payload) => {
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                })
                .catch((error) => {
                    console.log(error);;
                });
            });

            })
            .catch((error) => {
                console.log(error);
            });

        },
    },
    async mounted(){
        let res = await this.ApiService.getApi('payment/generate', {});
        this.token = res.token;
        console.log('tokennnn ' + this.token);
        this.getPayment();
    }
};
</script>

<template>

    <div class="container my-5">
        <h1 class="text-center font-bold mb-5">
            IMPOSTAZIONI DI PAGAMENTO
        </h1>
        <div class="row mb-5 mf-row row-cols-3">
            <div :class="{'active' : checkCart}" class="col" @click="checkCart = true, checkData= false, checkPayment= false">
                CARRELLO
            </div>
            <div class="col" @click="checkData = true, checkCart = false, checkPayment = false">
                DATI
            </div>
            <div class="col">
                PAGAMENTO
            </div>
        </div>
        <!-- CHECK CART -->
        <div v-if="checkCart">
            <SliderCart :cart="store.shopping_cart" />
            <div class="text-center mt-5">
                <button @click="checkCart = false, checkData = true">
                    VAI AL PROSSIMO STEP
                </button>
            </div>
        </div>
        <!-- //CHECK CART -->

        <!-- FORM PAYMENT -->
        <form

            id="payment-form"
            action="/api/payment/pay"
            method="post"
            @submit.prevent="submit"
            class="row py-5"
        >
            <div v-if="checkData" class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label"> NOME*:</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="UGO">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">COGNOME*:</label>
                    <input required type="text" class="form-control" id="surname" name="surname" placeholder="DE UGHI">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">INDIRIZZO*:</label>
                    <input required type="text" class="form-control" id="address" name="address" placeholder="Via dei fioccchi, 12">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email*: </label>
                    <input required type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <input type="hidden" name="token" id="token" value="fake-valid-nonce">
                <input type="hidden" name="cart" id="token" :value="JSON.stringify(store.shopping_cart)">


            </div>
            <div v-if="checkPayment" id="dropin-wrapper" class="d-flex justify-center align-items-center flex-column col-6">
                <div id="checkout-message"></div>
                <div id="dropin-container"></div>

                 <div class="text-center">
                    <button id="submit-button" type="submit" >
                        PAGA
                    </button>
                 </div>

                <input type="hidden" id="nonce" name="payment_method_nonce"  />
            </div>
        </form>
        <!--// FORM PAYMENT -->


    </div>

</template>

<style lang="scss" scoped>
.mf-row {
    background-color: #24645b;
    .col {
        color: #43efce;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        &.active {
            color: white;
            border-bottom: 4px solid #43efce;
        }
    }
}

button {
    border: none;
    background-color: #26635B;
    color: white;
    padding: 8px 15px;
    margin-bottom: 10px;
}
</style>
