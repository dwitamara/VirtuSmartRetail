import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/fontawesome-free/css/all.min.css','resources/css/sb-admin-2.min.css', 'resources/js/app.js',  'resources/jquery/js/jquery.min.js', 'resources/bootstrap/js/bootstrap.bundle.min.js', 'resources/jquery-easing/js/jquery.easing.min.js', 'resources/js/sb-admin-2.min.js', 'resources/chart.js/js/Chart.min.js', 'resources/js/demo/chart-area-demo.js', 'resources/js/demo/chart-pie-demo.js'],
            refresh: true,
        }),
    ],
});
