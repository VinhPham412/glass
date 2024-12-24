import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: [
                "app/**/*.php",
                "resources/views/**/*.php",
                "resources/js/**/*.js",
                "resources/css/**/*.css",
                "resources/lang/**/*.json",
                "config/**/*.php",
                "routes/**/*.php",
                'app/Http/Livewire/**',
                'app/Filament/**',
            ]
        })
    ],
});
