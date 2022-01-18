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
import Test from './views/test.vue';
import GalleryTable from './views/tables/GalleryTable.vue';
import ArtTable from './views/tables/ArtTable.vue';
import ExhibitTable from './views/tables/ExhibitTable.vue';
import PoetryTable from './views/tables/PoetryTable.vue';
import MusicTable from './views/tables/MusicTable.vue';
import UsersTable from './views/tables/UsersTable.vue';

import newArt from './views/forms/new/Art.vue';
import newMusic from './views/forms/new/Music.vue';
import newPoetry from './views/forms/new/Poetry.vue';
import newExhibit from './views/forms/new/Exhibit.vue';

import updateArt from './views/forms/update/Art.vue';
import updatePoetry from './views/forms/update/Poetry.vue';

import exhibitsView from './views/gallery/exhibitsView.vue';
import exhibitViewArt from './views/gallery/exhibitViewArt.vue';
import exhibitViewPoetry from './views/gallery/exhibitViewPoetry.vue';
import exhibitViewMusic from './views/gallery/exhibitViewMusic.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/gallery',
            name: 'exhibitsView',
            component: exhibitsView
        },
        {
            path: '/gallery/:id/art',
            component: exhibitViewArt,
        },
        {
            path: '/gallery/:id/poetry',
            component: exhibitViewPoetry,
        },
        {
            path: '/gallery/:id/music',
            component: exhibitViewMusic,
        },
        {
            path: '/vue/home',
            name: 'GalleryTable',
            component: GalleryTable,
        },
        {
            path: '/vue/art',
            name: 'ArtTable',
            component: ArtTable,
        },
        {
            path: '/vue/exhibit',
            name: 'ExhibitTable',
            component: ExhibitTable,
        },
        {
            path: '/vue/poetry',
            name: 'PoetryTable',
            component: PoetryTable,
        },
        {
            path: '/vue/music',
            name: 'MusicTable',
            component: MusicTable,
        },
        {
            path: '/vue/users',
            name: 'UsersTable',
            component: UsersTable,
        },
        {
            path: '/vue/newArt',
            name: 'newArt',
            component: newArt,
        },
        {
            path: '/vue/newMusic',
            name: 'newMusic',
            component: newMusic,
        },
        {
            path: '/vue/newPoetry',
            name: 'newPoetry',
            component: newPoetry,
        },
        {
            path: '/vue/newExhibit',
            name: 'newExhibit',
            component: newExhibit,
        },
        // ==================================EDIT ROUTES==================================
        {
            path: '/vue/update/Art/:id',
            name: 'updateArt',
            component: updateArt,
        },
        {
            path: '/vue/update/Poetry/:id',
            name: 'updatePoetry',
            component: updatePoetry,
        },

    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

const test = new Vue({
    el: '#wow',
    components: { Test },
    router,
});
