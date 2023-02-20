<script>
export default {
name: 'Category'
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

</style>
