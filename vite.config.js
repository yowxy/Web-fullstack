import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import sass from 'sass';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                implementation: sass,
            },
        },
    },
    build: {
        outDir: 'dist', // Set this to 'dist'
    },
});



