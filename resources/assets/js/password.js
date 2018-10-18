import Form from './core/Form';
import Modal from './components/Modal.vue';

if ($('body[view-name="passwordform').length > 0) {
    window.vue = new Vue({
        el: '#app',
        components: {
           Modal,
        },
        data: {
            form: new Form(),
            modal: Modal,
        },
        mounted() {
        },
        updated(){
        },
        watch: {
        },
        methods: {

            submit_form() {
                let url = '/admin/changePassword';

                if(this.form.new_password == this.form.confirm_password){
                    console.log(this.form);
                    this.form.submit(url, this.onSuccess);
                    $
                }else{
                    this.$refs.modal.configModal('Error', 'New password and confirm password are not the same.', '', 'OK');
                    this.$refs.modal.show();
                }
            },

            onSuccess(response) {
                try {
                    if (response.data.result == "true") {
                        this.form.reset();

                        this.$refs.modal.configModal('Success', 'Registration saved!', 'OK', '', function () {
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