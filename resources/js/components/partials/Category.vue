<script>
import {store} from '../../data/store';
export default {
    name: 'Category',
    props: {
        category: Object
    },
    data() {
        return {
            checked: false,
            store,
        }
    },
    methods: {
        changeCheck() {
            this.checked = !this.checked;
            if(this.checked)
                store.filtered.push(this.category.id);
            else
                store.filtered.splice(store.filtered.indexOf(this.category.id), 1);
        }
    }
}
</script>

<template>
<div class="box">
        <img :src="category.cover_image" :alt="category.slug">
        <p>{{ category.name }}</p>
        <div class="form-check m-2">
            <input @click="changeCheck()" class="form-check-input p-3 border-info" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
            </label>
        </div>
    </div>
</template>


<style lang="scss" scoped>
@use '../../../scss/partials/vars' as *;
@use '../../../scss/partials/guest/categories';
    .box {
      display: flex;
      align-items: center;
      justify-content: space-around;
      height: 45px;
      min-width: 100px;
      width: 380px;
      height: 130px;
      margin: 5px;
      padding: 10px;
      background-color: #597377;
      color: #e8e8e8;
      font-weight: bold;
      border-radius: 8px;
      margin-bottom: 45px;
      box-shadow: 2px 3px 2px 1px rgba($color: #000000, $alpha: 0.1);
      p {
        margin: 0;
        font-size: 0.7rem;
        text-transform: uppercase;
      }
      img{
        width: 60%;
        object-fit: contain;
      }
    }
</style>
