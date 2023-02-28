<script>
export default {
    name: 'Jumbo'
}
</script>

<template>
    <div class="jumbo-container w-100 d-flex align-items-center flex-column justify-content-end">
    </div>
        <!-- <div class="wave down">
                <svg class="wave-1hkxOo" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none"><path class="wavePath-haxJK1 animationPaused-2hZ4IO" d="M826.337463,25.5396311 C670.970254,58.655965 603.696181,68.7870267 447.802481,35.1443383 C293.342778,1.81111414 137.33377,1.81111414 0,1.81111414 L0,150 L1920,150 L1920,1.81111414 C1739.53523,-16.6853983 1679.86404,73.1607868 1389.7826,37.4859505 C1099.70117,1.81111414 981.704672,-7.57670281 826.337463,25.5396311 Z" fill="currentColor"></path></svg>
              </div> -->
</template>



<style lang="scss" scoped>
.wave svg {
  color: #D85355;
  display: block;
  margin-bottom: 100px;
}
.wave.down {
  transform: rotate(180deg);
  margin-top: -53px;
}
    .jumbo-container{
        height: 550px;
        margin-bottom: 50px;
        background-position: top;
        background-size: cover;
        background-image: url("../../assets/img/jumbotron.jpg");
        background-attachment: fixed;
    }
    	.search-div{
            input{
                margin-bottom: 60px;
                padding: 10px;
                height: 35px;
                width: 400px;
                border: none;
                border-radius: 6px;
            }
        }


        // ***********MEDIA QUERIES************



    @media  screen and (max-width:850px) {
       .jumbo-container{
        height: 450px;
       }
    }
    @media  screen and (max-width:390px) {
       .jumbo-container{
        height: 300px;
        background-position: center;
        background-size:contain;
        background-repeat: no-repeat;
        margin-bottom: 0;
       }
    }



</style>
