<script>
export default {
  name: 'Categories'
}
</script>

<template>
  <div class="container-fluid mt-5">
      <div class="boxes">

       <router-link :to="{name: 'italiano'}">
          <div class="box italiano">
              <img src="../../assets/img/pasta.jpg" alt="">
              <p>Italiano</p>
          </div>
        </router-link>

        <router-link :to="{name: 'giapponese'}">
          <div class="box giapponese">
            <img src="../../assets/img/giapponese.webp" alt="">
            <p>Giapponese</p>
          </div>
        </router-link>

        <router-link :to="{name: 'hamburger'}">
          <div class="box pub">
            <img src="../../assets/img/hamburger.webp" alt="">
            <p>Hamburger</p>
          </div>
        </router-link>

        <router-link :to="{name: 'panini'}">
          <div class="box panini">
            <img src="../../assets/img/panini.webp" alt="">
            <p>Panini</p>
          </div>
        </router-link>

        <router-link :to="{name: 'pizza'}">
          <div class="box pizza">
            <img src="../../assets/img/pizza.webp" alt="">
            <p>Pizza</p>
          </div>
        </router-link>

        <router-link :to="{name: 'hawaiano'}">
          <div class="box hawaiano">
            <img src="../../assets/img/poke.webp" alt="">
            <p>Hawaiano</p>
          </div>
        </router-link>

        <router-link :to="{name: 'kebab'}">
          <div class="box kebab">
            <img src="../../assets/img/kebabtalebano.webp" alt="">
            <p>Kebab</p>
          </div>
        </router-link>

     </div>
  </div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;

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
