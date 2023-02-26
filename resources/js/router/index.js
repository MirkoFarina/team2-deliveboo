import { createRouter, createWebHistory } from 'vue-router';

import HomeApp from '../pages/HomeApp.vue';
import ChiSiamo from "../pages/ChiSiamo.vue";
import Contatti from "../pages/Contatti.vue";
import Payment from "../pages/Payment.vue";
import CompletedPayment from "../pages/CompletedPayment.vue";
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
        path: "/payment",
        name: "payment",
        component: Payment,
    },
    {
        path: "/completed_payment",
        name: "completed_payment",
        component: CompletedPayment,
    },
    {
        path: "/:pathMatch(.*)*",
        component: Error404,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { top: 0 };
        }
    },
});

export default router;
