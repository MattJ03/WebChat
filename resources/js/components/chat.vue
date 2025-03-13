<script setup>
import { ref, onMounted, onUnmounted, defineProps } from "vue";
import axios from "axios";
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

const props = defineProps({
    initialMessages: Array,
    servetId: Number,
});

//message state
const messages = ref(props.initialMessages);
const newMessages = ref('');

//messging
onMounted(() => {
    window.Pusher = Pusher;
    window.echo = new Echo({
        broadcaster: 'pusher',
        key: import.meta.env.VITE_PUSHER_KEY,
        cluster: import.meta.env.VITE_PUSHER_CLUSTER,
        forceTLS: true
    });

    window.Echo.channel(`server.${props.serverId}`)
        .listen('MessageSent', (event) => {
            messages.value.push(event.message);
        });
});

// Cleanup when component unmounts
onUnmounted(() => {
    window.Echo.leaveChannel(`server.${props.serverId}`);
});

// Send a new message
const sendMessage = async () => {
    if (newMessage.value.trim() === '') return;

    await axios.post(`/servers/${props.serverId}/messages`, {
        content: newMessage.value,
    });

    newMessage.value = '';
};
</script>

<template>
    <div class="chat-container bg-black text-white p-4 h-screen">
        <div class="messages">
            <div v-for="message in messages" :key="message.id" class="mb-2">
                <strong>{{ message.user.name }}</strong>: {{ message.content }}
            </div>
        </div>

        <div class="input-container mt-4">
            <input
                v-model="newMessage"
                @keyup.enter="sendMessage"
                class="w-full p-2 text-black"
                placeholder="Type a message..."
            />
        </div>
    </div>
</template>


