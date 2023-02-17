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
        <div class="col" v-for="restaurant in store.restaurants" :key="restaurant.slug">
            <div class="card" style="width: 18rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title">{{ restaurant.name_of_restaurant }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
    </div>
  </div>
</template>


<style lang="scss" scoped>

</style>
