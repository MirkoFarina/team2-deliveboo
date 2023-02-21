
<script>
export default {
    name: 'Card',
    props: {
        food: Object
    }
}
</script>

<template>
    <div class="card card-lf">
        <div class="card-body card-body-lf">
            <div class="box">
                <div class="logo">
                    <img :src="food.cover_image" class="card-img-top" :alt="food.name">
                </div>
                <div class="info">
                    <h5 class="card-title fs-4 mb-4 text-uppercase">{{ food.name }}</h5>
                    <p class="card-text fs-6 m-0 mt-2">Ingredienti: {{ food.ingredients }}</p>
                    <p class="card-text fs-6">&euro; {{ food.price }}</p>
                     <div>
                        <p v-if="food.is_available === 1">Disponibile</p>
                        <p v-else>Non Disponibile</p>
                     </div>
                </div>
            </div>
                <button class="btn btn-outline-secondary m-2 float-end">Aggiungi al carrello</button>
        </div>
    </div>
</template>


<style lang="scss" scoped>
.card-lf {
    width: 600px;
    height: 300px;
    margin-bottom: 50px;
    border: none;
    background-color: #f9f8f8;
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
}</style>

