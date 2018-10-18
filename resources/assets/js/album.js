import Form from './core/Form';
import Modal from './components/Modal.vue';
import VueMask from 'v-mask'

if ($('body[view-name="albumform').length > 0) {
    window.vue = new Vue({
        el: '#app',
        components: {
           Modal, VueMask
        },
        data: {
            form: new Form(),
            modal: Modal,

            permissoes: null,
        },
        mounted() {
        },
        updated(){
        },
        watch: {
        },
        methods: {
            submit_form() {
                let url = '/admin/album';
                this.form.submit(url, this.onSuccess);
                $
            },

            onSuccess(response) {
                try {
                    if (response.data.result == "true") {
                        this.form.reset();

                        this.$refs.modal.configModal('Success', 'Record saved!', 'OK', '', function () {
                            util.goBack();
                        });
                        this.$refs.modal.show(1500);
                    } else {
                        this.form.reset();
                        this.$refs.modal.configModal('Error', response.data.msg, '', 'OK');
                        this.$refs.modal.show();
                    }
                } catch (e) {
                    console.log(e);
                }
            },

        },
    });
}