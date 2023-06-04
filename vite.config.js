import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/overrides.css",
                "resources/css/app.css",
                "resources/js/adform.js",
                "resources/js/reveal.js",
            ],
            refresh: true,
        }),
    ],
    build: {
        watch: {
            include: "resources/**",
        },
    },
});
