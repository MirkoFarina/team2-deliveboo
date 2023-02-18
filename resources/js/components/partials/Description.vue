<script>
export default {
 name: 'Description'
}
</script>

<template>
        <div class="wave">
            <svg class="wave-1hkxOo" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none"><path class="wavePath-haxJK1 animationPaused-2hZ4IO" d="M826.337463,25.5396311 C670.970254,58.655965 603.696181,68.7870267 447.802481,35.1443383 C293.342778,1.81111414 137.33377,1.81111414 0,1.81111414 L0,150 L1920,150 L1920,1.81111414 C1739.53523,-16.6853983 1679.86404,73.1607868 1389.7826,37.4859505 C1099.70117,1.81111414 981.704672,-7.57670281 826.337463,25.5396311 Z" fill="currentColor"></path></svg>
          </div>
  <section class="app_description w-100">
      <div class="container sc-container">
        <div class="d-flex justify-content-around p-5" >
            <div class="box w-50">
              <h2 class="my-5">Tutto ciò di cui hai bisogno, te lo portiamo noi!</h2>
              <p class="">
              Con DeliveBoo, puoi dare sfogo alla tua fantasia culinaria: tutto ciò che desideri ti viene consegnato ovunque tu sia,
              in pochi minuti! Vuoi ordinare cibo etnico proveniente da tutto il mondo, i migliori piatti dai ristoranti della città,
              bevande per un'uscita con gli amici e molto altro ancora? Nessun problema! Con DeliveBoo puoi ordinare tutto ciò che ti
              piace e ricevere comodamente a casa. Scopri i ristoranti disponibili nella tua zona, seleziona ciò che desideri e attendi la
              consegna. Lascia che DeliveBoo si occupi di tutto per te!</p>
            </div>
            <div class="img_area text-end w-50">
              <img src="../../assets/img/delivery.png" alt="">
            </div>
        </div>

      </div>
  </section>
        <div class="wave down">
            <svg class="wave-1hkxOo" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none"><path class="wavePath-haxJK1 animationPaused-2hZ4IO" d="M826.337463,25.5396311 C670.970254,58.655965 603.696181,68.7870267 447.802481,35.1443383 C293.342778,1.81111414 137.33377,1.81111414 0,1.81111414 L0,150 L1920,150 L1920,1.81111414 C1739.53523,-16.6853983 1679.86404,73.1607868 1389.7826,37.4859505 C1099.70117,1.81111414 981.704672,-7.57670281 826.337463,25.5396311 Z" fill="currentColor"></path></svg>
          </div>
</template>



<style lang="scss" scoped>
.wave svg {
  color: #F6F6F6;
  display: block;
}

.wave.down {
  transform: rotate(180deg);
  margin-top: -50px;
}

.app_description{

  background-color: #F6F6F6;
  padding: 10px;

  h2 {
      color: #252525;
      font-size: 2.5rem;
    }
  .box {
    border-radius: 8px;
    margin-bottom: 50px;

    p {
      font-size: 1.1rem;
      color: #494949;
      line-height: 33px;
    }
  }
  .img_area{
    img{
      transform: scaleX(-1);
    }
  }
}

</style>
