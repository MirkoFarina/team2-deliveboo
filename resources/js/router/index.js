import { createRouter, createWebHistory } from 'vue-router';

import HomeApp from '../pages/HomeApp.vue';


const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeApp
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})




export default router;
