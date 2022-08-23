require('./bootstrap');

window.Vue =  require('vue');

Vue.component('tenan-list', require('./components/tenant/TenanList.vue').default);
Vue.component('unit-list', require('./components/unit/UnitList.vue').default);

new Vue({
    el: '#App'
})