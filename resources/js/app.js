import './bootstrap';

import Alpine from 'alpinejs';

import { createApp } from 'vue';

import UsersList from "./components/users/UsersList.vue";



window.Alpine = Alpine;

Alpine.start();

const app = createApp({});

app.component('usersList', UsersList);

app.mount('#app');



// createApp(App).mount('#app');
