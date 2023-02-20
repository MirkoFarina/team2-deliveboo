<script>
import Category from './Category.vue'
import { store } from '../../data/store';
// import axios from 'axios';
// import { BASE_URL } from '../../data/data';

export default {
  name: 'Categories',
  data(){
    return{
        store,
    }
    },
    components: {
        Category
    }
}
</script>

<template>
  <div class="container mt-5 my-5">
      <div class="boxes">
       <a v-for="category in store.categories" :key="'category' + category.id" >
        <Category />
        </a>
     </div>
    <button class="btn btn-outline-secondary m-auto d-flex p-3 text-uppercase">Ricerca per categorie</button>
  </div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
  .boxes {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 30px;
    a {
        text-decoration: none;
      }
    .box {
      display: flex;
      align-items: center;
      justify-content: space-around;
      height: 45px;
      min-width: 100px;
      width: 300px;
      height: 70px;
      margin: 5px;
      padding: 10px;
      color: white;
      border-radius: 20px;
      margin-bottom: 45px;
      box-shadow: 2px 3px 2px 1px rgba($color: #000000, $alpha: 0.2);
      p {
        margin: 0;
        font-size: 0.7rem;
        text-transform: uppercase;
      }
      img{
        width: 45%;
        object-fit: contain;
      }
    }
  }
</style>
