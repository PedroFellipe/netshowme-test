<template>
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Netshow.me
                </div>
                <div>
                    <p style="font-size: 30px">Formulário de Contato</p>
                </div>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           required
                           placeholder="Nome"
                           name="name"
                           v-model="newContact.name">
                    <tr v-for="name_errors in errors.name">
                        <div style="color: #e3342f"> {{name_errors}}</div>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text"
                           class="form-control"
                           id="email"
                           required
                           placeholder="email@exemplo.com"
                           name="email"
                           v-model="newContact.email">
                    <tr v-for="email_errors in errors.email">
                        <div style="color: #e3342f"> {{email_errors}}</div>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <the-mask type="text"
                              class="form-control"
                              id="phone"
                              required
                              placeholder="Telefone"
                              name="phone"
                              :mask="['(##) #####-####', '(##) ####-####']"
                              v-model="newContact.phone">
                    </the-mask>
                    <tr v-for="phone_errors in errors.phone">
                        <div style="color: #e3342f"> {{phone_errors}}</div>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="message">Mensagem</label>
                    <textarea
                        class="form-control"
                        rows="4"
                        id="message"
                        required
                        placeholder="Mensagem"
                        name="message"
                        v-model="newContact.message"
                    ></textarea>
                    <tr v-for="message_errors in errors.message">
                        <div style="color: #e3342f"> {{message_errors}}</div>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="attachment">Anexo</label>
                    <input
                        ref="fileInput"
                        type="file"
                        class="form-control-file"
                        id="attachment"
                        name="attachment"
                        v-on:change="fileUpload()"
                        required
                    >
                    <tr v-for="attachment_errors in errors.attachment">
                        <div style="color: #e3342f"> {{attachment_errors}}</div>
                    </tr>
                </div>
                <div>
                    <button :disabled="loading" class="btn btn-primary btn-lg btn-block"
                            @click.prevent="createContact()">
                        <span v-if="loading" class="spinner-border" role="status" aria-hidden="true"></span>
                        <span v-if="loading" class="sr-only">Enviando...</span>
                        <span v-else>Cadastrar</span>
                    </button>
                </div>
                <br><br>
                <div>
                    <p style="font-size: 30px">Lista de Envios</p>
                </div>
                <p v-if="!contacts.length">Nenhum contato foi enviado</p>
                <table v-if="contacts.length" class="table table-striped" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Detalhes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="contact in contacts">
                        <th scope="row">{{contact.id}}</th>
                        <td>{{contact.name}}</td>
                        <td>{{contact.email}}</td>

                        <td @click="setVal(contact.id, contact.name, contact.email, contact.phone, contact.ip, contact.message, contact.attachment)"
                            class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                            <i
                                class="fa fa-eye"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Contato</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td style="padding: 0 0 20px;">
                                            <h3 style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                                Informações enviadas</h3>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                                <strong>Nome: </strong> {{modal_name}} </p>

                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                                <strong>E-mail: </strong> {{modal_email}}</p>

                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                                <strong>Telefone: </strong> {{modal_phone}} </p>

                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                                <strong>Endereço de IP: </strong>{{modal_ip}} </p>

                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                                <strong>Mensagem:</strong> {{modal_message}} </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;"></p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                                <strong>Baixar Anexo: </strong> <a :href=modal_attachment
                                                                                   target="_blank"
                                                                                   class="fa fa-download"></a>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;"></p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {TheMask} from "vue-the-mask";

    export default {

        components: {
            TheMask
        },
        data() {
            return {
                newContact: {'name': '', 'email': '', 'phone': '', 'message': '', 'ip': '', 'attachment': ''},
                hasError: true,
                contacts: [],
                modal_id: '',
                modal_name: '',
                modal_email: '',
                modal_phone: '',
                modal_message: '',
                modal_ip: '',
                modal_attachment: '',
                errors: [],
                loading: false
            }
        },
        mounted: function mounted() {
            this.getContacts();
        },
        methods: {
            getContacts: function getContacts() {
                var _this = this;
                axios.get('/api/contacts').then(function (response) {
                    _this.contacts = response.data;
                }).catch(error => {
                    this.errors = error.response.data.errors || {};
                });
            },
            createContact: function createContact() {
                this.loading = true;
                var input = this.newContact;
                let formData = this.getFormData(this.newContact);
                var _this = this;

                axios.post('/api/contacts', formData, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }
                }).then(function (response) {
                    _this.$toastr.s('Contato criado com sucesso', 'Sucesso')
                    _this.loading = false;
                    _this.clear()
                    _this.getContacts();
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.$toastr.w(
                            "Exitem erros no formulário! Verifique e tente novamente!",
                            "Atenção!"
                        );
                        this.errors = error.response.data.errors || {};
                    }
                    _this.loading = false;
                });
            },
            getFormData(data) {
                var formData = new FormData();
                if (data instanceof Object) {
                    Object.keys(data).forEach(key => {
                        const value = data[key];
                        if (Array.isArray(value)) {
                            if (value.length > 0) {
                                value.forEach(val => {
                                    formData.append(`${key}[]`, val);
                                });
                            } else {
                                formData.append(`${key}`, []);
                            }
                        } else {
                            formData.append(key, value);
                        }
                    });
                }
                return formData;
            },
            setVal(val_id, val_name, val_email, val_phone, val_ip, val_message, val_attachment) {
                this.modal_id = val_id;
                this.modal_name = val_name;
                this.modal_email = val_email;
                this.modal_phone = val_phone;
                this.modal_message = val_message;
                this.modal_ip = val_ip;
                this.modal_attachment = val_attachment;
            },
            fileUpload() {
                this.newContact.attachment = this.$refs.fileInput.files[0]
            },
            clear() {
                this.$refs.fileInput.value = '';
                this.newContact = {'name': '', 'email': '', 'phone': '', 'message': '', 'ip': '', 'attachment': ''}
                this.errors = []
            }
        }
    }
</script>
