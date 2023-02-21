<script>
export default {
    name: 'Card',
    props: {
        restaurant: Object
    }
}
 </script>

<template>
    <div class="card card-lf">
        <div class="card-body card-body-lf">
            <div class="box">
                <div class="logo">
                    <img :src="restaurant.cover_image" class="card-img-top" :alt="restaurant.name_of_restaurant">
                </div>
                <div class="info">
                    <h5 class="card-title fs-4 mb-4 text-uppercase">{{ restaurant.name_of_restaurant }}</h5>
                    <span v-for="category in restaurant.categories" :key="category.slug" class="badge text-bg-dark mx-1 my-1">{{ category.name }}</span>
                    <p class="card-text fs-6 m-0 mt-4">Indirizzo: {{ restaurant.address }}</p>
                    <p class="card-text fs-6">Numero: {{ restaurant.phone_number }}</p>
                </div>
            </div>
            <!-- <p class="card-text">Piatti Disponibili: {{ restaurant.foods.length }}</p> -->
                <router-link :to="{ name: 'detail', params: { slug: restaurant.slug } }" class="btn btn-outline-secondary mt-3 text-uppercase">Vai al ristorante</router-link>
        </div>
    </div>
</template>


<style lang="scss" scoped>
    .card-lf {
        width: 600px;
        height: 300px;
        border: none;
        background-color: #f6f6f6;
        padding: 10px;
        box-shadow: 1px 2px 2px rgba($color: #000000, $alpha: 0.1);
        padding: 10px 15px;
    }

    .card-body-lf {
        .box {
            display: flex;
            justify-content: space-around;
            .logo {
                width: 30%;
                  img {
                    object-fit: contain;
                    height: 80%;
                    width: 80%;
                 }
            }
            .info {
                width: 60%;
                height: 200px;
            }
        }
    }
</style>
