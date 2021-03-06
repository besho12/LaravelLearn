/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Form from 'vform';
window.Form = Form;

import Swal from 'sweetalert2';
window.Swal = Swal;

// import Dropzone from '../../public/js/dropzone';
// window.Dropzone = Dropzone;



import filter from './filter';





///////when convert from mobile inspect to desktop inspect//////
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    window.mobile = true;
} else {
    window.mobile = false;
}
///////when convert from mobile inspect to desktop inspect//////


import VueRouter from 'vue-router'
Vue.use(VueRouter)
import store from './store';

import vuetify from './vuetify';





// import Sortable from '../../public/js/sortable.js';
// // global export
// window.Sortable = Sortable;



// import Sortable from 'vue-sortable'
// Vue.use(Sortable)




import 'jquery/dist/jquery.min.js';
import 'bootstrap/dist/css/bootstrap.min.css';


import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";


// import "datatables.net-buttons/js/buttons.colVis.js";
import "datatables.net-buttons/js/buttons.colVis.min.js";
import "datatables.net-buttons/js/buttons.flash.min.js";
import "datatables.net-buttons/js/buttons.html5.min.js";
import "datatables.net-buttons/js/buttons.print.min.js";
import "datatables.net-buttons/js/dataTables.buttons.min.js";
import "datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js";

import "datatables.net-dt/css/jquery.dataTables.css";








let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/settings', component: require('./components/Settings.vue').default },


    { path: '/add_admin', component: require('./components/Admins/AddAdmin.vue').default },
    { path: '/view_admin', component: require('./components/Admins/ViewAdmin.vue').default },    


    { path: '/add_teacher', component: require('./components/Teachers/AddTeacher.vue').default },
    { path: '/view_teacher', component: require('./components/Teachers/ViewTeacher.vue').default },    


    { path: '/add_course', component: require('./components/Courses/AddCourse.vue').default },
    { path: '/view_project', component: require('./components/Courses/ViewProject.vue').default },    
    { path: '/view_projects', component: require('./components/Courses/ViewProjects.vue').default },    


    { path: '/charts/piecahrt', component: require('./components/Charts/Piechart.vue').default },
    { path: '/charts/barchart', component: require('./components/Charts/Barchart.vue').default },
    // { path: '/users', component: Foo },
    // { path: '/teachers', component: Bar },
    // { path: '/students', component: Bar },
    // { path: '/courses', component: Bar },
]

let router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('attachment-component', require('./components/AttachmentComponent.vue').default);
Vue.component('vuetify', require('./components/Vuetify.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
    filter,
    vuetify,
});