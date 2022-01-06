/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router'
Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './views/app.vue';
import GalleryTable from './views/tables/GalleryTable.vue';
import ArtTable from './views/tables/ArtTable.vue';
import ExhibitTable from './views/tables/ExhibitTable.vue';
import PoetryTable from './views/tables/PoetryTable.vue';
import MusicTable from './views/tables/MusicTable.vue';
import Uwu from './views/test.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        // {
        //     path: '/',
        //     name: 'home',
        //     component: Home
        // },
        {
            path: '/test/home',
            name: 'GalleryTable',
            component: GalleryTable,
        },
        {
            path: '/test/art',
            name: 'ArtTable',
            component: ArtTable,
        },
        {
            path: '/test/exhibit',
            name: 'ExhibitTable',
            component: ExhibitTable,
        },
        {
            path: '/test/poetry',
            name: 'PoetryTable',
            component: PoetryTable,
        },
        {
            path: '/test/music',
            name: 'MusicTable',
            component: MusicTable,
        },
        {
            path: '/test/5',
            name: 'Uwu',
            component: Uwu,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
