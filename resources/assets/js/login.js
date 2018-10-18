import Form from './core/Form';
import Modal from './components/Modal.vue';

if ($('body[view-name="login"]').length > 0) {

    window.vue = new Vue({
        el: '#app',

        components: {
            Modal
        },
        data: {
            form: new Form(),
            modal: Modal
        },
        mounted() {
        },
        methods: {
            submit_form() {
                let url = '/admin/login';
                this.form.submit(url, this.onSuccess);
            },

            onSuccess(response) {
                try {
                    if (response.data.result == "true") {
                        if(response.data.redirect == ""){
                            window.location.href = window.baseUrl+'/admin/home';
                        }else{
                            window.location.href = window.baseUrl+response.data.redirect;
                        }
                    } else {
                        this.form.reset();
                        this.$refs.modal.configModal('Erro', response.data.msg, '', 'OK');
                        this.$refs.modal.show();
                    }
                } catch (e) {
                    console.log(e);
                }
            },
        },
    });
}