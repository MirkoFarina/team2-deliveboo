import { createRouter, createWebHistory } from 'vue-router';
import { ApiService } from "../services/api.service";

import HomeApp from '../pages/HomeApp.vue';
import ChiSiamo from "../pages/ChiSiamo.vue";
import Contatti from "../pages/Contatti.vue";
import Login from "../pages/Login.vue";
import RestaurantsDetails from '../pages/RestaurantsDetails.vue';
import Error404 from "../pages/Error404.vue"

const routes = [
    {
        path: "/",
        name: "home",
        component: HomeApp,
    },
    {
        path: "/chisiamo",
        name: "chisiamo",
        component: ChiSiamo,
    },
    {
        path: "/restaurants-details/:slug",
        name: "detail",
        component: RestaurantsDetails,
    },
    {
        path:"/contatti",
        name:"contatti",
        component: Contatti
    },
    {
        path: "/login",
        name: "login",
        component: Login,
    },
    {
        path: "/:pathMatch(.*)*",
        component: Error404,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach(() => {

    /* invece di fare una chiamata a prescindere controllare se la data delle ultime modifiche coincide con quel del DB
        1. Implementare Api che ritorni il datetime del last_updated
        2. Aggiungere eccezioni al beforeEach
    */

    ApiService.getApi('restaurants', '');
    ApiService.getApi('categories', '');
});




export default router;
