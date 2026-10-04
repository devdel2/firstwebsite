import { createRouter, createWebHistory } from "vue-router";

import Home from '../../views/Home.vue';
import Bands from '../../views/Bands.vue';
import Education from '../../views/Education.vue';
import Career from '../../views/Career.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/bands',
        name: 'bands',
        component: Bands
    },
    {
        path: '/education',
        name: 'education',
        component: Education
    },
    {
        path: '/career',
        name: 'career',
        component: Career
    }
]

const Router = createRouter({
    history: createWebHistory(),
    routes
})

export default Router;