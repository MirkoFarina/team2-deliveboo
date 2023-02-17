<script>
export default {
  name: 'login'
}
</script>

<template>
  <div class="container w-50">
    <h3 class="mb-4">Crea il tuo account personale</h3>
    <form action="">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Cognome</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Cognome">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Indirizzo Mail">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nuova Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Crea una nuova Password">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Ripeti la Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Ripeti la nuova Password">
      </div>
      <button class="btn btn-outline-info" type="submit">Registrati</button>
    </form>
  </div>
</template>


<style lang="scss" scoped>

</style>