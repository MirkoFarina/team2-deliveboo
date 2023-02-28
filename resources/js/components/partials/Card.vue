<script>
export default {
    name: 'Card',
    props: {
        restaurant: Object
    }
}
 </script>

<template>
      <div class="card">
         <div class="card__image-container h-75">
           <img class="card__image" :src="restaurant.cover_image" :alt="restaurant.name_of_restaurant">
        </div>

          <svg class="card__svg" viewBox="100 80 450 500">

            <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#F6F6F6"/>
            <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="10" fill="transparent"/>
          </svg>

         <div class="card__content h-50">
           <h1 class="card__title">{{ restaurant.name_of_restaurant }}</h1>
           <span v-for="category in restaurant.categories" :key="category.slug" class="badge  mx-1 " style="background-color: #26635B;">{{ category.name }}</span>
            <p class="card-text fs-6 m-0 mt-2">Indirizzo: {{ restaurant.address }}</p>
            <p class="card-text fs-6">Telefono: {{ restaurant.phone_number }}</p>
            <a class="text-decoration-none text-uppercase text-primary-emphasis" style="color: #26635B;" :href="restaurant.website"><p class="card-text fs-6">Website</p></a>
        </div>
              <div class="button">
                    <router-link :to="{ name: 'detail', params: { slug: restaurant.slug } }" class="btn btn-lf  btn-query">Vai al ristorante</router-link>
              </div>
      </div>


</template>




<style lang="scss" scoped>
.btn-lf {
    background-color: #26635B;
    color: white;

    &:hover {
        background-color: #657573;
    }
}
.card__image-container {
    img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: #F6F6F6;
    width: 400px;
    height: 680px;
    border-radius: 6px;
    padding: 2rem;
    color: #696969;
    box-shadow: 0 .25rem .25rem rgba(0,0,0,0.2),
        0 0 1rem rgba(0,0,0,0.2);
    overflow: hidden;
    transition: .3s;

  &:hover{
     transform: scale(1.05);
  }

  &__image-container {
    margin: -2rem -2rem 1rem -2rem;
  }

  &__line {
  opacity: 0;
  animation: LineFadeIn .6s .6s forwards ease-in;
  }

  &__image {
    opacity: 0;
    animation: ImageFadeIn .4s .4s forwards;
  }

  &__title {
    color: #171717;
    margin-top: 0;
    font-weight: 800;
    letter-spacing: 0.01em;
    font-size: 2rem;
  }

  &__content {
    margin-top: -1rem;
    opacity: 0;
    animation: ContentFadeIn .4s .4s forwards;
  }

  &__svg {
    position: absolute;
    left: 0;
    top: 120px;
  }
}

@keyframes LineFadeIn {
  0% { opacity: 0; d: path("M 0 300 Q 0 300 0 300 Q 0 300 0 300 C 0 300 0 300 0 300 Q 0 300 0 300 "); stroke: #fff; }
  50% { opacity: 1; d: path("M 0 300 Q 50 300 100 300 Q 250 300 350 300 C 350 300 500 300 650 300 Q 750 300 800 300"); stroke: #26635b; }
  100% { opacity: 1; d: path("M -2 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 802 400"); stroke: #26635b; }
}

@keyframes ContentFadeIn {
  0% { transform: translateY(-1rem); opacity: 0; }
  100% { transform: translateY(0); opacity: 1; }
}

@keyframes ImageFadeIn {
  0% { transform: translate(-.5rem, -.5rem) scale(1.05); opacity: 0; filter: blur(2px); }
  50% { opacity: 1; filter: blur(2px); }
  100% { transform: translateY(0) scale(1.0); opacity: 1; filter: blur(0); }
}


   // **********MEDIA***********


    @media screen and (max-width: 378px) {
       .card {
        margin: 0 auto;
       }
    }

</style>
