import { createRouter, createWebHistory } from "vue-router";

import Home from '../../views/Home.vue';
import Bands from '../../views/Bands.vue';
import Education from '../../views/Education.vue';

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/bands',
        component: Bands
    },
    {
        path: '/education',
        component: Education
    }
]

const Router = createRouter({
    history: createWebHistory(),
    routes
})

export default Router;