<script>
export default {
  name: 'Hawaiano'
}
</script>

<template>
  <div class="container-lf">
    <h1 class="text-center my-3">Hawaiano</h1>
    <div class="cards">
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
      <div class="card">
        <p>Ristorante</p>
      </div>
    </div>
    <button class="btn btn-outline-info float-end"><router-link :to="{ name: 'home' }">Home</router-link></button>
  </div>
</template>


<style lang="scss" scoped>

    button {
      a {
        text-decoration: none;
      }
    }

.cards {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  padding-top: 50px;

  .card {
    width: 200px;
    height: 100px;
    padding: 30px;
    text-align: center;
    background-color: #e1e1e1;
    margin-bottom: 40px;
  }
}
</style>
