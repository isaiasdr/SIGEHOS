/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import BootstrapVue from 'bootstrap-vue'
require('./bootstrap');

window.Vue = require('vue');

Vue.use(BootstrapVue);	
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar-sigehos', require('./components/navbar').default);
Vue.component('registro-paciente', require('./components/registro_paciente.vue').default);
Vue.component('consulta-tipos', require('./components/consulta_tipos_habitaciones_camas.vue').default);
Vue.component('consulta-camas', require('./components/consulta_camas.vue').default);
Vue.component('admision-paciente', require('./components/admision_paciente.vue').default);
Vue.component('solicitud-traslado', require('./components/solicitud_traslado.vue').default);
Vue.component('control-traslado', require('./components/control_traslado.vue').default);
Vue.component('altas-permisos', require('./components/altas_permisos.vue').default);
Vue.component('reportes', require('./components/reportes.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app2 = new Vue({
    el: '#navbar',
});

const app = new Vue({
    el: '#contenido',
});
