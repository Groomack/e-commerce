import { createRouter, createWebHistory } from "vue-router";
import home from '../components/HomePage.vue';
import notFound from '../components/NotFoundPage.vue';

const routes = [
    {
        path: '/',
        component: home,
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound,
    },
    
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router