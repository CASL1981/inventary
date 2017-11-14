
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('vue-pagination', require('./components/Pagination.vue'));

const  app = new Vue({
    el: '#app',
    data: {
        users: [],
        counter: 0,
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
    },
    mounted : function() {
        this.getUsers(this.pagination.current_page);
    },
    methods: {
        getUsers(page) {
            var _this = this;
            $.ajax({
                url: '/user/api?page='+page,
                success: (response) => {
                   _this.users = response.data;
                   _this.pagination = response;
                }
            });
        }
    }
});
