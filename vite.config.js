import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig(({ command, mode }) => ({
    base: mode === "development" ? "/" : "https://www.michel-5.com/build/",
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: { outDir: "dist", manifest: true },
    resolve: { alias: { "@": "/resources/js" } },
}));
