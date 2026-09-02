require('./bootstrap');

window.Vue = require('vue');
const VueRouter = require('vue-router');

Vue.use(VueRouter);

const Home = {
    data() {
        return {
            loading: true,
            status: '',
            message: '',
        };
    },
    mounted() {
        axios.get('/api/test-connection').then((response) => {
            this.status = response.data.status;
            this.message = response.data.message;
        }).catch(() => {
            this.status = 'error';
            this.message = 'Unable to reach the Laravel API.';
        }).finally(() => {
            this.loading = false;
        });
    },
    template: `
        <section>
            <h1>Atlas Orbit Frontend Shell</h1>
            <p v-if="loading">Checking API connection...</p>
            <p v-else>API status: {{ status }} - {{ message }}</p>
        </section>
    `,
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
    el: '#app',
    router,
    template: '<router-view></router-view>',
});
