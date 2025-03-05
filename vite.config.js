// import { defineConfig } from "vite";
// import laravel from "laravel-vite-plugin";
// import vue from "@vitejs/plugin-vue";

// export default defineConfig(({ command, mode }) => ({
//     plugins: [
//         laravel({
//             input: ["resources/css/app.css", "resources/js/app.js"],
//             refresh: true,
//         }),
//         vue({
//             template: {
//                 transformAssetUrls: {
//                     base: null,
//                     includeAbsolute: false,
//                 },
//             },
//         }),
//     ],
//     build: {
//         outDir: "build/.vite",
//         manifest: true,
//         rollupOptions: {
//             input: {
//                 app: "resources/js/app.js",
//             },
//         },
//     },
//     resolve: { alias: { "@": "/resources/js" } },
// }));

import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
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
});
