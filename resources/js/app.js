import "./bootstrap";
import Alpine from "alpinejs";
import { Reverb } from 'laravel-reverb';

const reverb = new Reverb({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: false,
    enabledTransports: ['ws', 'wss'],
});

reverb.connect();

reverb.subscribe(`chat.${userId}`).listen('chat.message', (event) => {
    if (event.receiver_id === userId) {
        Livewire.emit('messageReceived', event.message);
    }
});

window.Alpine = Alpine;

Alpine.start();
