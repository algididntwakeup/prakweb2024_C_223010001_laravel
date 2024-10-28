import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'], // sesuaikan dengan file entry Anda
            refresh: true,
        }),
    ],
    build: {
        manifest: true,             // pastikan manifest diaktifkan
        outDir: 'public/build',     // pastikan ini sesuai dengan struktur Laravel
    },
});
