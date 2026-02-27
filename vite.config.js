import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/welcome.js',
                'resources/js/admin.js',
                'resources/js/events.js',
                'resources/js/login.js',
                'resources/js/music.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
