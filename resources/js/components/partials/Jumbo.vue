<script>
export default {
    name: 'Jumbo'
}
</script>

<template>
    <div class="jumbo-container w-100 d-flex align-items-center flex-column justify-content-end">
        <div class="search-div">
            <a href="#"></a>
            <input type="text" class="searchbar" placeholder="Cerca un ristorante">
        </div>
    </div>
</template>



<style lang="scss" scoped>
    .jumbo-container{
        height: 500px;

        background-position: center;
        background-size: cover;
        background-image: url("../../assets/img/jumbotron.jpg");

    	.search-div{
            input{
                margin-bottom: 60px;
                padding: 10px;

                height: 35px;
                width: 400px;
                border: none;
                border-radius: 6px;


            }
        }
    }
</style>
