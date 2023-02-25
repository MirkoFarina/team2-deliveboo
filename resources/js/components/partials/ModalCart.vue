<script>
export default {
    name: 'ModalCart'
}
</script>


<template>
    <div class="mf-modal text-center" >
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
</div>

</template>

<style lang="scss" scoped>
    .mf-modal {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
    }
</style>
