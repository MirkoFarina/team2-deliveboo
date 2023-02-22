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
  <h1>Il nostro team</h1>
  <div class="container">
  <div class="card"  style="width: 18rem;" v-for="(profile, index) in team" :key="index">
  <img :src="profile.img" class="card-img-top" alt="profile.name">
  <div class="card-body">
    <h5 class="card-title">{{ profile.name }}</h5>
    <h5 class="card-title">{{ profile.usrname }}</h5>
    <p class="card-text">{{ profile.rule }}</p>


  </div>
</div>
</div>

</template>

<style lang="scss" scoped>
h1 {
  text-align: center;
  text-transform: uppercase;
}
.container {
  display: flex;
}
.card{
    margin:20px;
    border-radius:20px;
}
img{
    width:100%;
    height:100%;
    object-fit:cover;
}


</style>
