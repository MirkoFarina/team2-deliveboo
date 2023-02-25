<script>
import { store } from '../../data/store';
import { deleteCart } from '../../data/functions';
export default {
    name: 'ModalCart',
    data(){
        return {
            store,
            deleteCart
        }
    }
}
</script>


<template>
    <div :class="{'active' : store.is_modal}" class="overlay d-flex justify-center align-items-center">
        <div  class="mf-modal text-center" >
            <div class="modal-dialog">
                <div class="modal-content">
                <div>
                    <h2 class="text-center text-danger" >ATTENZIONE !!! </h2>
                </div>
                <div class="modal-body my-5">
                    <p class="fs-5">
                        Ti ricordiamo che puoi ordinare solo da un ristorante alla volta, <br> sei sicuro di voler svuotare il carrello?
                    </p>
                </div>
                <div class="text-center">
                    <button @click="store.is_modal = false, store.is_canvas = false" type="button" class="btn btn-primary mx-3" data-bs-dismiss="modal">Close</button>
                    <button @click="deleteCart" type="button" class="btn btn-danger">SVUOTA</button>
                </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style lang="scss" scoped>

    .overlay {
        background-color: rgba($color: #000000, $alpha: 0.8);
        width: 100vw;
        height: 100vh;
        z-index: 9999;
        position: fixed;
        top: -100%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: all .7s;
        &.active {
            top: 50%;
        }
    }
    .mf-modal {
        margin: 0 auto;
        background-color: white;
        padding: 20px;
        border-radius: 5px;
    }
</style>
