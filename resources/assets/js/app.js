
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('offcanvas-left', require('./components/offcanvasLeft.vue'));
Vue.component('offcanvas-right', require('./components/offcanvasRight.vue'));
Vue.component('dropdown', require('./components/dropdown.vue'));
Vue.component('additem', require('./components/addItem.vue'));
Vue.component('thumbnails', require('./components/thumbnails.vue'));
Vue.component('VueAffix', require('vue-affix'));


const app = new Vue({
    el: '#app',
    methods: {
        widgetToggle() {
            var icon = document.querySelector('.toggle-widgets > .fa').classList;
            var right = document.getElementById('widgets').classList;
            if ( right.contains('showing') ) {
                right.remove('showing');
                icon.remove('fa-angle-right');
                icon.add('fa-angle-left');
            }
            else {
                right.add('showing');
                icon.remove('fa-angle-left');
                icon.add('fa-angle-right');
            }
        }
    }
});
