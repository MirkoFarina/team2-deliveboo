<script>
import {ApiService} from '../services/api.service';
export default {
    name: "Payment",
    token: "",

    data() {
        return {
            ApiService,
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
    }
};
</script>

<template>

    <div class="container">
        <form 
            id="payment-form"
            action="/api/payment/pay"
            method="post"
            @submit.prevent="submit"
        >
        <input type="hidden" name="token" id="token" value="fake-valid-nonce">

            <div id="dropin-wrapper">
                <div id="checkout-message"></div>
                <div id="dropin-container"></div>

                <button
                    class=""
                    id="submit-button"
                    @click.prevent="getPayment()"
                >
                    Submit payment
                </button>

                <input type="submit" id="nonce" name="payment_method_nonce"  />


            </div>
        </form>


    </div>

</template>

<style>
.cc-img {
        margin: 0 auto;
    }
</style>
