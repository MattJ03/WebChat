import { createRouter, createWebHistory } from 'vue-router';
import chat from 'resources/js/components/chat.vue';
import serverlist from 'resources/js/components/serverlist.vue';

const routes = [
    {path: '/', component: chat},
    {path: '/serverlist:id', component: serverlist},
];

const router = createRouter({
    history: createWebHistory(),
})

export default router;


