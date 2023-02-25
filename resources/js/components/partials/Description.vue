<script>
import 'animate.css';
export default {
 name: 'Description',
 data(){
    return {
        scrollPosition  : null,
        isShow          : false
    }
 },
 methods:
 {
    updateScrollPosition(){
        this.scrollPosition = window.scrollY;
    },
    showAnimation(){
        if(this.scrollPosition >= 0) this.isShow = true;
    }
 },
 mounted(){
    window.addEventListener("scroll", this.updateScrollPosition);
    this.showAnimation();
 }
}
</script>

<template>
  <section class="app_description w-100">
      <div class="container sc-container">
        <div class="d-flex justify-content-around p-3 flex-wrap-reverse" >
            <div class="box col-lg-6 col-md-12">
              <h2 class="my-5">Tutto ciò di cui hai bisogno, te lo portiamo noi!</h2>
              <p class="p-2">
              Con DeliveBoo, puoi dare sfogo alla tua fantasia culinaria: tutto ciò che desideri ti viene consegnato ovunque tu sia,
              in pochi minuti! Vuoi ordinare cibo etnico proveniente da tutto il mondo, i migliori piatti dai ristoranti della città,
              bevande per un'uscita con gli amici e molto altro ancora? Nessun problema! Con DeliveBoo puoi ordinare tutto ciò che ti
              piace e ricevere comodamente a casa. Scopri i ristoranti disponibili nella tua zona, seleziona ciò che desideri e attendi la
              consegna. Lascia che DeliveBoo si occupi di tutto per te!</p>
            </div>
            <div :class="{'animate__animated animate__bounceInRight' : isShow}" class="img_area text-lg-end text-md-center col-lg-6 col-md-12  ">
              <img src="../../assets/img/delivery.png" alt="">
            </div>
        </div>

      </div>
  </section>
</template>



<style lang="scss" scoped>

.app_description{
  margin-top: 10px;
  h2 {
      color: #161616;
      font-size: 2.8rem;
      font-weight: bold;
    }
  .box {
    border-radius: 8px;


    p {
      font-size: 1.1rem;
      color: #585858;
      line-height: 28px;
    }
  }
  .img_area{
    animation-duration: 2.5s;
    img{
      transform: scaleX(-1);
    }
  }
}

@media screen and (max-width: 470px){
    .img_area{
        img{
            width: 200px;
            margin: 0 auto;
        }
    }

    .app_description {
        h2 {
            font-size: 2.2rem;
        }
    }
}
</style>
