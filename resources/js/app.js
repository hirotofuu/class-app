/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import './bootstrap';
 import { createApp } from 'vue';
 import router from './router.js'
 import store from './store/index.js'
 import App from './layouts/App.vue'
 createApp(App)
     .use(router)
     .use(store)
     .mount('#app')
