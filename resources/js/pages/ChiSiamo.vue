<script>
import team from "../data/team";
export default {
  name: "ChiSiamo",

  data() {
    return {
      team,
    };
  },
};
</script>



<template>
  <h1 class="text-center text-uppercase pt-5 fs-4">The team</h1>
  <div class="container d-flex align-items-center w-100 justify-content-center">
    <div class="row">
            <div class="col-4 card mx-1 my-5 profile" v-for="(profile, index) in team" :key="index" style="width: 15rem;">
                <img :src="profile.img" class="card-img-top p-2" :alt="profile.name">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold">{{ profile.name }}</h5>
                    <h5 class="card-title fw-bold">{{ profile.usrname }}</h5>
                    <p class="card-text">{{ profile.rule }}</p>
                </div>
             </div>
    </div>
  </div>





</template>

<style lang="scss" scoped>

img{
    width:100%;
    height:100%;
    object-fit:cover;
}
.profile{
    background-color:#43ddbe;
    transition:transform .2s;
    cursor: pointer;
    &:hover{
         transform: scale(0.9);
    }
}



</style>
