import { createApp } from 'vue';
import Chat from './components/chat.vue';

const appElement = document.getElementById('app');

const app = createApp(Chat, {
    initialMessages: JSON.parse(appElement.dataset.messages),
    serverId: appElement.dataset.serverId
});

app.mount('#app');
