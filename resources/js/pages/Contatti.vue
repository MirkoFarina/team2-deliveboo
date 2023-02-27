<script>
import team from "../data/team";
export default {
  name: "Contatti",

  data() {
    return {
      team,
    };
  },
};
</script>


<template>
  <div class="container">
    <div class="card-header">
      <h1>Per malfunzionamenti contattare:</h1>
      <div class="img">
        <img src="../assets/img/sos.png" alt="sos" />
      </div>
    </div>
    <div class="box-card" v-for="(profile, index) in team" :key="index">
      <div class="profile-blog blog-border">
        <div class="img_box">
        <img
          class="rounded-x"
          :src="profile.img"
          alt=""
        />
        </div>
        <div class="name-location">
          <strong>{{ profile.name }}</strong>
          <strong>{{ profile.usrname }}</strong>
          <span
            ><i class="fa-solid fa-location-dot"></i>{{ profile.luogo }}
            </span
          >
        </div>
        <div class="clearfix margin-bottom-20"></div>
        <ul class="list-inline share-list">
          <li><i class="fa-solid fa-envelope"></i>{{ profile.email }}</li>
          <li><i class="fa-solid fa-phone"></i>{{ profile.number }}</li>
        </ul>
      </div>
    </div>
  </div>
</template>


<style lang="scss" scoped>
.container {
  margin-top: 40px;
  text-align: center;
}

.card-header {
  display: flex;
  padding: 10px 20px;
  margin-bottom: 10px;
  justify-content: space-between;
  align-items: center;
  background-color: #d50006;
  color: white;
}
.profile-blog{
    padding-bottom: 30px;
    padding-top: 30px;
    background-color: #ebebeb;
    margin-bottom: 30px;
    border: 1px solid #a6a6a6;
}

img {
  width: 100px;

}
.img_box{
    width: 200px;
    height: 200px;
    margin: 0 auto;
    padding: 10px;
}
.rounded-x{
    border-radius: 50%;
    height: 100%;
    width: 100%;
    object-fit: cover;
}
span  {
    color: blue;
}
strong{
    color: #555;
   display: block;
   font-size: 20px;
}
.margin-bottom-20 {
    margin-bottom: 20px;
}
.share-list {
    margin-bottom: 0;
}

.list-inline {
    padding-left: 0;
    margin-left: -5px;
    list-style: none;
}

.list-inline li {
    display: inline-block;
    padding-right: 5px;
    padding-left: 5px;
    font-size:20px;
}

.share-list li i {
    color: #72c02c;
    margin-right: 5px;
}



</style>
