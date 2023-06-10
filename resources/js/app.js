import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import addproduct from './components/addProduct.vue';
import menu_btn from './components/menu.vue';
import banners_web from './components/banners.vue';
import breadcrumb from './components/breadcrumb.vue';
import new_right from './components/new_right.vue';
import new_left from './components/new_left.vue';
import footer_main from './components/footer.vue';
app.component('addproduct', addproduct);
app.component('menu_btn', menu_btn);
app.component('banners_web' , banners_web);
app.component('breadcrumb' , breadcrumb);
app.component('new_right' , new_right);
app.component('new_left' , new_left);
app.component('footer_main' , footer_main);

app.mount('#app');
