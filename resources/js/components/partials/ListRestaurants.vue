<script>
import {store} from '../../data/store'
export default {
    name: 'ListRestaurants',
    data() {
        return {
        store
      }
    }
}
</script>

<template>
  <div class="container">
    <div class="row">
        <!-- PER LUCA TUTTO DA STILIZZARE, FARE ANCHE PAGINA PER MENU RISTORANTI SU CUI POI FAREMO ANCHE GLI ORDINI  -->


        <div class="col" v-for="restaurant in store.restaurants" :key="restaurant.slug">
            <div class="card" style="width: 18rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">{{ restaurant.name_of_restaurant }}</h5>
                <span v-for="category in restaurant.categories" :key="category.slug" class="badge text-bg-danger">{{category.name}}</span>
                <p class="card-text">Indirizzo: {{ restaurant.address }}</p>
                <p class="card-text">Numero: {{ restaurant.phone_number }}</p>
                <p class="card-text">Piatti Disponibili: {{ restaurant.foods.length }}</p>
                <a href="#" class="btn btn-primary">VAI AL RISTORANTE</a>
            </div>
            </div>
        </div>
    </div>
  </div>
</template>


<style lang="scss" scoped>

</style>
