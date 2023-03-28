import {createWebHistory, createRouter} from 'vue-router';
import home from './pages/home.vue';
import show from './pages/show.vue';
import create from './pages/create.vue';
import search from './pages/search.vue';
import category from './pages/category.vue';


const routes=[
    {
        path:'/',
        name: 'home-url',
        component: home
    },
    {
        path:'/tweets/:tweetId',
        name: 'show-url',
        component: show,
        props: true
    },
    {
        path:'/tweets/create',
        name: 'create-url',
        component: create
    },
    {
        path:'/tweets/search/:searchTitle',
        name: 'search-url',
        component: search,
        props:true,
    },
    {
        path:'/tweets/category/:categoryTitle',
        name: 'category-url',
        component: category,
        props:true,
    },
];
const router= createRouter({
    history:createWebHistory(),
    routes
});

export default router;
