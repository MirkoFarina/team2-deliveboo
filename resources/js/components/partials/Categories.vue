<script>
import Category from './Category.vue'
import { store } from '../../data/store';
import { filterResCat } from '../../data/functions';
// import axios from 'axios';
// import { BASE_URL } from '../../data/data';

export default {
  name: 'Categories',
  data(){
    return{
        store,
        filterResCat,
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
            <Category :category="category" />
            </a>
        </div>
        <button @click="filterResCat()" class="btn btn-outline-secondary m-auto d-flex p-3 text-uppercase">Ricerca per categorie</button>
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

  }
</style>
