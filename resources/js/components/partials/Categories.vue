<script>
import { store } from '../../data/store';

export default {
  name: 'Categories',
  data(){
    return{
        store
    }
  }
}
</script>

<template>
  <div class="container mt-5 my-5">
      <div class="boxes">

       <router-link :to="{name: 'italiano'}" v-for="category in store.categories" :key="category.slug">
          <div class="box">
              <img :src="category.cover_image" :alt="category.slug">
              <p>{{category.name}}</p>
          </div>
        </router-link>


     </div>
  </div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
  .boxes {
    display: flex;
    justify-content: space-around;
    margin-top: 30px;
    a {
        text-decoration: none;
        color: white;
      }
    .box {
      display: flex;
      align-items: center;
      justify-content: space-around;
      height: 45px;
      min-width: 100px;
      width: 170px;
      height: 70px;
      margin: 5px;
      padding: 10px;
      border-radius: 20px;
      margin-bottom: 45px;
      box-shadow: 2px 3px 2px 1px rgba($color: #000000, $alpha: 0.2);
      p {
        margin: 0;
        font-size: 0.7rem;
        text-transform: uppercase;
      }
      img{
        width: 70%;
        object-fit: contain;
      }
      &:hover {
        background-color: $secondary-color;
      }
    }
  }
</style>
