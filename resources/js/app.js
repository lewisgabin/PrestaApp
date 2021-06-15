/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
 
window.Vue = require('vue').default;
import Vue from 'vue'
import VTooltip from 'v-tooltip'
import vSelect from 'vue-select'
import VueLoading from 'vuejs-loading-plugin'
import VueToast from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast);


// using default options
Vue.use(VueLoading)


// overwrite defaults
Vue.use(VueLoading, {
  dark: true, // default false
  text: 'Ladataan', // default 'Loading'
  loading: true, // default false
  background: 'rgb(255,255,255)', // set custom background
  classes: ['myclass'] // array, object or string
})


Vue.component('v-select', vSelect)
Vue.use(VTooltip)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home', require('./components/Home.vue').default);
Vue.component('sidebar', require('./components/Sidebar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from './routes'
import 'vue-select/dist/vue-select.css';
const app = new Vue({ 
    el: '#app',
    router,
    
});
