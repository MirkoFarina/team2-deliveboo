<script>
import Jumbo from './partials/Jumbo.vue';
import Categories from './partials/Categories.vue';
import Description from './partials/Description.vue';
export default {
    name: 'AppMain',
    components: {
        Jumbo,
        Categories,
        //CategorySlider,
        Description
    }
}
</script>

<template>
    <main>
        <Jumbo />
        <Categories />
        <Description />
    </main>
</template>



<style lang="scss">

</style>
