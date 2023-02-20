<script>
export default {
    name: 'Category',
    props: {
        category: Object
    },
    data() {
        return {
            checked: false
        }
    },
    methods: {
        
    }
}
</script>

<template>
<div class="box">
        <img :src="category.cover_image" :alt="category.slug">
        <p>{{ category.name }}</p>
        <div class="form-check m-2">
        <input class="form-check-input p-3 border-info" type="checkbox" value="" id="flexCheckIndeterminate">
        <label class="form-check-label" for="flexCheckIndeterminate">
        </label>
        </div>
    </div>
</template>


<style lang="scss" scoped>
    .box {
      display: flex;
      align-items: center;
      justify-content: space-around;
      height: 45px;
      min-width: 100px;
      width: 300px;
      height: 70px;
      margin: 5px;
      padding: 10px;
      color: white;
      border-radius: 20px;
      margin-bottom: 45px;
      box-shadow: 2px 3px 2px 1px rgba($color: #000000, $alpha: 0.2);
      p {
        margin: 0;
        font-size: 0.7rem;
        text-transform: uppercase;
      }
      img{
        width: 45%;
        object-fit: contain;
      }
    }
</style>
