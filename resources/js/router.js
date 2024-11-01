import Vue from 'vue';
import Router from 'vue-router';

import Login from './views/Login/Login.vue';
import Landing from './views/DMC/_Landing.vue';

import Admin_Home from './views/DMC/Admin/_Admin_Home.vue';
import Admin_Dashboard from './views/DMC/Admin/_Admin_Dashboard.vue';
import Admin_Event_Add from './views/DMC/Admin/_Admin_EventAdd.vue';
import Admin_Event_List from './views/DMC/Admin/_Admin_EventList.vue';

import Author_Home from './views/DMC/Author/_Author_Home.vue';
import Author_Events from './views/DMC/Author/_Author_Events.vue';
import Author_Dashboard from './views/DMC/Author/_Author_Dashboard.vue';
import Author_Event_Add from './views/DMC/Author/_Author_EventAdd.vue';
import Author_Event_List from './views/DMC/Author/_Author_EventList.vue';
import Author_Album_Page from './views/DMC/Author/_Author_AlbumPage.vue';


import Photo_Add from './views/DMC/Admin/_Admin_EventAdd.vue';
import Photo_List from './views/DMC/Admin/_Admin_EventAdd.vue';
import Video_Add from './views/DMC/Admin/_Admin_EventAdd.vue';
import Video_List from './views/DMC/Admin/_Admin_EventAdd.vue';



Vue.use(Router);

const routes = [
    
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/',
        name: '',
        component: Landing
    },
    {
        path: '/admin/home',
        name: 'admin-home',
        component: Admin_Home,
        children: [
            {
                path: '/admin/home/dashboard',
                name: 'admin-home-dashboard',
                component: Admin_Dashboard,
            },
            {
                path: '/admin/event/add',
                name: 'admin-event-add',
                component: Admin_Event_Add,
            },
            {
                path: '/admin/event/list',
                name: 'admin-event-list',
                component: Admin_Event_List,
            },
        ],
    },
    {
        path: '/author/home',
        name: 'author-home',
        component: Author_Home,
        children: [
            {
                path: '/album/:id',
                name: 'album',
                component: Author_Album_Page
            },
            {
                path: '/author/home/dashboard',
                name: 'author-home-dashboard',
                component: Author_Dashboard,
            },
            {
                path: '/author/events',
                name: 'author-events',
                component: Author_Events,
            },
            {
                path: '/author/event/add',
                name: 'author-event-add',
                component: Author_Event_Add,
            },
            {
                path: '/author/event/list',
                name: 'author-event-list',
                component: Author_Event_List,
            },
        ],
    }
];

const router = new Router({
    routes: routes,
    linkActiveClass: 'active'
});

export default router;