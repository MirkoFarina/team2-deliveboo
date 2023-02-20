<script>
import Jumbo from './partials/Jumbo.vue';
import Categories from './partials/Categories.vue';
import Description from './partials/Description.vue';
import ListRestaurants from './partials/ListRestaurants.vue';
export default {
    name: 'AppMain',
    components: {
        Jumbo,
        Categories,
        //CategorySlider,
        Description,
        ListRestaurants
    }
}
</script>

<template>
    <main>
        <Jumbo />
        <Description />
        <Categories />
        <ListRestaurants/>
    </main>
</template>



<style lang="scss">

</style>
