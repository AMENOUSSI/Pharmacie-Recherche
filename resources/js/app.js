import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import MainLayout from './Layouts/MainLayout.vue'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';




createInertiaApp({
    title: (title) => `${title} - ${appName}`,

    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('MainLayout', MainLayout)

            .mount(el);

    },
    progress: {
        color: '#4B5563',
    },
});

route('home');
route('pharmacie.index');

route('pharmacie.create');

route('pharmacie.edit');

route('pharmacie.store');




route('produit.edit');
route('produit.store');
route('produit.afficher');
route('produit.update');
route('produit.create');

route('categorie.index')

/* route('categorie.afficher');
route('categorie.create');
route('categorie.store');
route('categorie.edit');
route('categorie.update'); */

