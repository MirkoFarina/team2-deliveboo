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
  <div class="container w-75 my-5">
    <h2 class="text-center text-uppercase py-5">I nostri ristoranti</h2>
    <div class="row">
        <!-- PER LUCA TUTTO DA STILIZZARE, FARE ANCHE PAGINA PER MENU RISTORANTI SU CUI POI FAREMO ANCHE GLI ORDINI  -->
        <div class="col my-5" v-for="restaurant in store.restaurants" :key="restaurant.slug">
            <div class="card card-lf m-auto">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body card-body-lf">
                <h5 class="card-title fs-3 py-3 text-uppercase">{{ restaurant.name_of_restaurant }}</h5>
                <span v-for="category in restaurant.categories" :key="category.slug" class="badge text-bg-dark mx-1 mb-5">{{category.name}}</span>
                <p class="card-text fs-5">Indirizzo: {{ restaurant.address }}</p>
                <p class="card-text fs-5">Numero: {{ restaurant.phone_number }}</p>
                <p class="card-text">Piatti Disponibili: {{ restaurant.foods.length }}</p>
                <a href="#" class="btn btn-outline-secondary mt-5 text-uppercase">Vai al ristorante</a>
            </div>
            </div>
        </div>
    </div>
  </div>
</template>


<style lang="scss" scoped>
    .card-lf {
        width: 30rem;
        height: 450px;
        border: none;
    }

    .card-body-lf {
        background-color: #f6f6f6;
        border-radius: 10px;
        box-shadow: 2px 3px 2px 1px rgba($color: #000000, $alpha: 0.2);
        padding: 15px 26px;
    }
</style>
