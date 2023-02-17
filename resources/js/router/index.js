import { createRouter, createWebHistory } from 'vue-router';

import HomeApp from '../pages/HomeApp.vue';
import ChiSiamo from "../pages/ChiSiamo.vue";
import Login from "../pages/Login.vue";
import Italiano from '../pages/Italiano.vue';
import Giapponese from "../pages/Giapponese.vue";
import Hamburger from "../pages/Hamburger.vue";
import Panini from "../pages/Panini.vue";
import Pizza from "../pages/Pizza.vue";
import Hawaiano from "../pages/Hawaiano.vue";
import Kebab from "../pages/Kebab.vue";
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
        path: "/login",
        name: "login",
        component: Login,
    },
    {
        path: "/italiano",
        name: "italiano",
        component: Italiano,
    },
    {
        path: "/giapponese",
        name: "giapponese",
        component: Giapponese,
    },
    {
        path: "/hamburger",
        name: "hamburger",
        component: Hamburger,
    },
    {
        path: "/panini",
        name: "panini",
        component: Panini,
    },
    {
        path: "/pizza",
        name: "pizza",
        component: Pizza,
    },
    {
        path: "/hawaiano",
        name: "hawaiano",
        component: Hawaiano,
    },
    {
        path: "/kebab",
        name: "kebab",
        component: Kebab,
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
