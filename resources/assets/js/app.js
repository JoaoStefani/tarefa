require('./bootstrap');
//npm install admin-lte --save
require('admin-lte/dist/js/adminlte.min');

window.Vue = require('vue');

import Form from './core/Form';
import Modal from './components/Modal.vue';

//https://github.com/probil/v-mask
import VueMask from 'v-mask';
Vue.use(VueMask);


//https://github.com/vuejs-tips/v-money/
import money from 'v-money'
Vue.use(money, {precision: 2});

//https://www.npmjs.com/package/vue2-datepicker
// <datepicker lang="pt-br" format="dd/MM/yyyy" :editable="true" width="100%" input-class="form-control" input-name="data_saida" v-model="data_saida"/>
import Datepicker from 'vue2-datepicker';
Vue.use(Datepicker);

    //https://github.com/moreta/vue-search-select
//import { ModelListSelect, ModelSelect , BasicSelect , MultiSelect, ListSelect, MultiListSelect} from 'vue-search-select'

//https://vue-multiselect.js.org/#sub-single-select
import Multiselect from 'vue-multiselect';



require('./util');
require('./user');
require('./login');
require('./password');
require('./artist');
require('./album');

if(window.vue == undefined) {
    window.app = new Vue({
        el: '#app',
        components: {
            Modal
        },
        data: {
            //mesmo que não tenha nada
            form: new Form(),
        },
    });
}