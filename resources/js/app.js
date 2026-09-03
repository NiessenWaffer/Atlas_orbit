import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App.vue';

Vue.use(VueRouter);

const Home = {
    render(createElement) {
        return createElement(App);
    },
};

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
        },
    ],
});

new Vue({
    router,
    render: (createElement) => createElement({ template: '<router-view />' }),
}).$mount('#app');
