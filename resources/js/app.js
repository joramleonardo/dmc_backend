import Vue from 'vue';
import App from './App.vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css'
// import 'bootstrap';

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);


Vue.mixin({
    mounted() {
        if (typeof refreshFsLightbox === 'function') {
            refreshFsLightbox();
        }
    }
});


new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
