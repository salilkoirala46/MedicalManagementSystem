/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap.js';
import { createApp } from 'vue';
import App from './App.vue';

import axios from 'axios';
import router from './router/index.js';


// import components here



const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(router);
app.mount('#app');
