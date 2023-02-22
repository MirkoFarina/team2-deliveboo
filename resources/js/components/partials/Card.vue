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
                    <p class="card-text fs-6 m-0 mt-2">Indirizzo: {{ restaurant.address }}</p>
                    <p class="card-text fs-6">Telefono: {{ restaurant.phone_number }}</p>
                     <a class="text-decoration-none text-uppercase text-primary-emphasis" :href="restaurant.website"><p class="card-text fs-6">Website</p></a>
                </div>
            </div>
            <div class="button">
                <router-link :to="{ name: 'detail', params: { slug: restaurant.slug } }" class="btn btn-outline-secondary mt-3 text-uppercase btn-query">Vai al ristorante</router-link>
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped>
    .card-lf {
        width: 100%;
        min-width: 500px;
        height: 350px;
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
                    height: 100%;
                    width: 100%;
                 }
            }
            .info {
                width: 50%;
                padding: 10px 20px;
                height: 200px;
            }
        }
    }


    // **********MEDIA***********

    @media screen and (max-width: 600px) {
    .btn-query {
        width: 100%;
        margin-top: 10px;
    }
           .card-lf {
        width: 50%;
        min-width: 300px;
        height: 540px;
        padding: 10px;
        align-items: center;
        margin: 0 auto;
    }
           .card-body-lf {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        .box {
            display: block;
            .logo {
                width: 100%;
            }
            .info {
                margin: 0;
                width: 100%;
            }
        }
    }
}
</style>
