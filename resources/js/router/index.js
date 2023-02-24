import { createRouter, createWebHistory } from 'vue-router';
import { ApiService } from "../services/api.service";

import HomeApp from '../pages/HomeApp.vue';
import ChiSiamo from "../pages/ChiSiamo.vue";
import Contatti from "../pages/Contatti.vue";
import Payment from "../pages/Payment.vue";
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
        path: "/payment",
        name: "payment",
        component: Payment,
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

export default router;
