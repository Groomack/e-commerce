import { createRouter, createWebHistory } from "vue-router";
import notFound from '../pages/NotFoundPage.vue';

const routes = [
   
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