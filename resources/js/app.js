import "../css/app.css";
import "./bootstrap";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import AppLayout from "./Layouts/AppLayout.vue";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        // Add debugging to see what's being passed
        console.log("Resolving component:", name);

        // Clean the name by removing any escape characters
        const cleanName = name.replace(/\\/g, "");

        return resolvePageComponent(
            `./Pages/${cleanName}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );
    },
    setup({ el, App, props, plugin }) {
        return createApp({
            render: () =>
                h(AppLayout, null, {
                    default: () => h(App, props),
                }),
        })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
