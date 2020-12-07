import VueToastr from "vue-toastr";
import VueRouter from 'vue-router';
import router from './router';

const { default: Axios } = require('axios');

require('./bootstrap');
window.Vue = require('vue');

Vue.component('index', require('./Index.vue').default);

Vue.router = router;
Vue.use(VueRouter);
Vue.use(VueToastr);

const app = new Vue({
    el: '#app',
    router,
    data: {
        newContact: {'name': '', 'email': '', 'phone': '', 'message' : '' , 'ip': '' },
        hasError: true,
        contacts: [],
        e_id: '',
        e_name: '',
        e_email: '',
        e_phone: '',
        e_message: '',
        e_ip: '',

    }
    // mounted: function mounted(){
    //     this.getContacts();
    // },
});
//
// const app = new Vue({
//     el: '#app',
//     data: {
//         newContact: {'name': '', 'email': '', 'phone': '', 'message' : '' , 'ip': '' },
//         hasError: true,
//         contacts: [],
//         e_id: '',
//         e_name: '',
//         e_email: '',
//         e_phone: '',
//         e_message: '',
//         e_ip: '',
//
//     },
//     mounted: function mounted(){
//         this.getContacts();
//     },
//     methods: {
//         getContacts: function getContacts(){
//             var _this = this;
//             axios.get('/api/contacts').then(function(response){
//                 _this.contacts = response.data;
//             }).catch(error=>{
//                 console.log("Get All: "+error);
//             });
//         },
//         createContact: function createContact() {
//             var input = this.newContact;
//             var _this = this;
//             if(input['make'] == '' || input['model'] == '') {
//                 this.hasError = false;
//             }
//             else {
//                 this.hasError= true;
//                 axios.post('/api/contacts', input).then(function(response){
//                     _this.$toastr.s('Contato criado com sucesso', 'Sucesso')
//                     _this.newContact = {'name': '', 'email': '', 'phone' : '', 'message' : '', 'ip' : ''}
//                     _this.getContacts();
//                 }).catch(error=>{
//                     if (error.response.status === 422) {
//                         this.$toastr.w(
//                             "Verifique os dados preenchidos e tente novamente",
//                             "Existem erros no formulário"
//                         );
//                         this.errors = error.response.data.errors || {};
//                     }
//                     console.log("Insert: "+error);
//                 });
//             }
//         },
//
//         setVal(val_id, val_name, val_email,val_phone, val_ip, val_message) {
//             this.e_id = val_id;
//             this.e_name = val_name;
//             this.e_email = val_email;
//             this.e_phone = val_phone;
//             this.e_message = val_message;
//             this.e_ip = val_ip;
//         },
//
//     }
// });
