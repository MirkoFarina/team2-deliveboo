<script>
import {store} from '../../data/store';
import { filterResCat, setPaginate, resetPaginate } from '../../data/functions';
export default {
    name: 'Category',
    props: {
        category: Object
    },
    data() {
        return {
            checked: false,
            store,
            filterResCat,
            setPaginate,
            resetPaginate
        }
    },
    methods: {
        changeCheck() {
            this.checked = !this.checked;
            if(this.checked)
                store.filtered.push(this.category.id);
            else
                store.filtered.splice(store.filtered.indexOf(this.category.id), 1);


            filterResCat();
            resetPaginate();
            setPaginate();
        }
    }
}
</script>

<template>
<div  @click="changeCheck()" :class="{'active' : checked}" class="box">
        <img :src="category.cover_image" :alt="category.slug">
        <p>{{ category.name }}</p>
</div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
    .box {
      display: flex;
      align-items: center;
      justify-content: space-around;
      height: 110px;
      padding: 10px;
      color: #e8e8e8;
      font-weight: bold;
      border-radius: 8px;
      box-shadow: 2px 3px 2px 1px rgba($color: #000000, $alpha: 0.1);
      cursor: pointer;
      &.active {
        background-color: #FF5758 !important;
      }
      p {
        margin: 0;
        font-size: 0.7rem;
        text-transform: uppercase;
      }
      img{
        width: 60%;
        object-fit: contain;
      }

    }


    // **********MEDIA***********

@media screen and (max-width: 470px){
    .box {
        width: 250px;
        margin: 0 auto;
        height: 100px;
    }
}
@media screen and (max-width: 770px){
    .box:nth-child(1) {
    background-color: #26635B;
}
.col.swiper-slide:nth-child(2) .box{
    background-color: #A5703C;
}
 .swiper-slide:nth-child(3) .box{
    background-color: #a8960e;
}
.swiper-slide:nth-child(4) .box{
    background-color: #2f8844;
}
.swiper-slide:nth-child(5) .box{
    background-color: #FA7E17;
}
.swiper-slide:nth-child(6) .box{
    background-color: #5da016;
}
.swiper-slide:nth-child(7) .box{
    background-color: #686868;
}
.swiper-slide:nth-child(8) .box{
    background-color: #563017;
}
}
</style>
