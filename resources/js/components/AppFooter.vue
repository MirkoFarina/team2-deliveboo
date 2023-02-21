<script>
export default {
    name: 'AppHeader'
}
</script>

<template>
    <footer>
        <div class="container w-75 d-flex justify-content-between align-items-center h-100">

            <div class="left">
                <ul>
                    <li><router-link :to="{name: 'chisiamo'}">Chi siamo</router-link></li>
                    <li><router-link :to="{name: 'contatti'}">Contatti</router-link></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Termini e Condizioni</a></li>
                </ul>
            </div>
            <div class="center">
                <ul>
                    <li><a href="#">Top Food</a></li>
                    <li><a href="#">Top Restaurant</a></li>
                    <li><a href="#">Top Cities</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li><router-link :to="{name: 'login'}">Aggiungi il tuo ristorante</router-link></li>
                    <li><a href="#">Contratti Collettivi</a></li>
                    <li><a href="#">Opportunità di Carriera</a></li>
                    <li><a href="#">Soci</a></li>
                </ul>
            </div>
        </div>
    </footer>
</template>



<style lang="scss" scoped>

    footer {
        background-color: #26635B;
        height: 120px;
        ul {
            margin: 0;
            padding: 0;
            li {
                list-style: none;
                a {
                    color: white;
                    text-decoration: none;
                    font-size: 0.8rem;
                }
            }
        }
        .line {
            width: 100%;
            height: 2px;
            background-color: white;
        }
    }
</style>
