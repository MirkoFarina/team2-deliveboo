<script>
export default {
    name: 'AppHeader'
}
</script>

<template>
    <footer>
        <div class="container d-flex justify-content-between align-items-center h-50 border-bottom lf-container mb-5">

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
                    <li><a href="#">Aggiungi il tuo ristorante</a></li>
                    <li><a href="#">Contratti Collettivi</a></li>
                    <li><a href="#">Opportunità di Carriera</a></li>
                    <li><a href="#">Soci</a></li>
                </ul>
            </div>
        </div>
            <div class="down container d-flex justify-content-between w-100 align-items-center">
                <div class="logo">
                    <router-link :to="{ name: 'home' }"
                        ><img src="../assets/img/logoboo.png" alt="logo"
                    /></router-link>
                </div>
                <a href="/register" class="btn btn-secondary">Registrati</a>
            </div>
    </footer>
</template>



<style lang="scss" scoped>

    footer {
        background-color: #26635B;
        height: 400px;
        .logo {
            img {
                width: 50px;
            }
        }
        ul {
            margin: 0;
            padding: 0;
            li {
                list-style: none;
                a {
                    color: white;
                    text-decoration: none;
                    font-size: 0.9rem;
                    &:hover {
                        color: #c1c1c1;
                    }
                }
            }
        }
        .line {
            width: 100%;
            height: 2px;
            background-color: white;
        }
    }

    @media screen and (max-width: 600px) {
    .lf-container {
        width: 80%;
    }
    .center {
        display: none;
    }
}
</style>
