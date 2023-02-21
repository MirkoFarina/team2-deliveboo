<script>
import { store } from '../../data/store';
import {nextPrev} from '../../data/functions';
export default {
  name: 'Paginator',
  components: {
    },
    data(){
        return{
            store,
            nextPrev,
        }
    },
    methods:{
        
    },
    mounted(){
    },
}
</script>

<template>

<div
    class="
    btns
    container-fluid
    d-flex
    justify-content-center
    align-items-center
    "
    v-if="store.pagination.total_records >= 1"
    >
        <button
        class="btn btn-primary"
        @click="nextPrev(false)"
        v-show="store.pagination.current_page > 1"
        >Prev</button>
        <h4 class="p-3">
            {{store.pagination.current_page}} / {{ Math.ceil(store.pagination.total_records/store.pagination.passo) }}
        </h4>
        <button
            class="btn btn-primary" @click="nextPrev(true)" v-show="store.pagination.current_page < (Math.ceil(store.pagination.total_records/store.pagination.passo))"
        >Next</button>
    </div>

</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
</style>
