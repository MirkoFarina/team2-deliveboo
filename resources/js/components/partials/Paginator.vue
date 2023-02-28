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
        <a
        class="arrow"
        @click="nextPrev(false)"
        v-show="store.pagination.current_page > 1"
        ><i class="fa-solid fa-angle-left"></i></a>
        <h4 class="p-3">
            {{store.pagination.current_page}} / {{ Math.ceil(store.pagination.total_records/store.pagination.passo) }}
        </h4>
        <a
            class="arrow" @click="nextPrev(true)" v-show="store.pagination.current_page < (Math.ceil(store.pagination.total_records/store.pagination.passo))"
        ><i class="fa-solid fa-angle-right"></i></a>
    </div>

</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';

.arrow{
    font-size: 2rem;
    padding: .3rem;
    cursor: pointer;
    color: #26635B;
}
</style>
