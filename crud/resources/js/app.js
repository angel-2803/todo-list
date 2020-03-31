

require('./bootstrap');

window.Vue = require('vue');

Vue.component('principal-component', require('./components/PrincipalComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('tareas', require('./components/TareasComponent.vue').default);
Vue.component('Titulo', require('./components/AddComponent.vue').default);



const app = new Vue({
    el: '#app',
});
