<script>
import {deleteCart} from '../data/functions';

export default {
    name: "CompletedPayment",
    data(){
        return{
            deleteCart,
        }
    },
    mounted(){
        this.deleteCart();
    }
};

</script>

<template>
    <div class="mf-container container d-flex flex-column justify-content-center align-items-center gap-3">

        <!-- TODO
            1. Implementare il fallito pagamento e i controlli sul response da sendPayment (PaymentController)
        -->

        <!-- PAGAMENTO CONCLUSO CON SUCCESSO -->
        <svg style="max-width: 250px;"
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 50 50"
            xml:space="preserve"
            >
            <circle style="fill: #25ae88" cx="25" cy="25" r="25" />
            <polyline
                style="
                fill: none;
                stroke: #ffffff;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-miterlimit: 10;
                "
                points="
                    38,15 22,33 12,25 "
            />
        </svg>

        <h3>Pagamento completato con successo :)</h3>

        <a href="/" class="text-decoration-none">Torna alla home</a>


    </div>
</template>

<style scoped >
.mf-container {
    padding-top: 100px;
}

    button, a {
        border: none;
        color: white;
        background-color: #26635B;
        padding: 8px 15px;
        margin-bottom: 10px;
        border-radius: 5px;
        cursor: pointer;
        display: inline-block;
    }
</style>
