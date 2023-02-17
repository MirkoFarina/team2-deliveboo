<script>
import team  from '../data/team'
export default {
  name: "ChiSiamo",

  data() {
    return {
        team
    };
  },
};
</script>

<template>
  <h1>Il nostro team</h1>
  <div class="container d-flex w-80 flex-wrap">
    <div class="card" style="width: 18rem" v-for="(profile, index) in team" :key="index">
      <img class="card-img" :src="profile.img" alt="Card image " />
      <div class="card-body">
        <h5 class="card-title">{{ profile.name }}</h5>
        <h5 class="card-title">{{ profile.usrname }}</h5>
        <h4>{{ profile.rule }}</h4>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
h1{
  text-align: center;
  margin-bottom: 40px;
}
.card-img{
  object-fit: cover;
  height: 100%;
  width: 100%;

}
.card{
  margin: 10px;
}


</style>
