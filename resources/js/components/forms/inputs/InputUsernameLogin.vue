<template>
    <div>
        <label class="font-size-minus mb-1" for="inputUsername">
            <span :class="{'font-panton-bold text-second':usernames.cpf, 'text-muted': usernames.email}">CPF</span>
            /
            <span :class="{'font-panton-bold text-second':usernames.email, 'text-muted': usernames.cpf}">E-mail</span>
        </label>
        <input type="text" v-model="form.username" @keyup="validateUsername" :name="name" id="inputUsername" :class="['form-control form-sd', {'is-invalid':errors}]">
        <div class="invalid-feedback">
            {{ errors }}
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            value:{
                type: String,
                default: ''
            },
            name:{
                type: String,
                default: ''
            },
            errors:{
                type: String,
                default: ''
            },
        },
        data() {
            return {
                form:{
                    username: this.value,
                },
                usernames:{
                    cpf: false,
                    email: false
                },
            }
        },
        computed: {
            getUsername:function(){
                if(this.usernames.cpf){
                    return {
                        cpf_cnpj: this.form.username,
                        password: this.form.password
                    }
                }else{
                    return {
                        email: this.form.username,
                        password: this.form.password
                    }
                }
            }
        },
        methods: {
            validateUsername:function(){
                var str = this.form.username
                if(str.length == 0){
                    this.usernames.cpf = false
                    this.usernames.email = false
                }else{
                    var input = str.match(/[0-9a-zA-Z@]/g).join('')
                    if(isNaN(input)){
                        this.usernames.email = true
                        this.usernames.cpf = false
                    }else{
                        if(input.length < 12){
                            this.usernames.cpf = true
                            this.usernames.email = false
                        }else{
                            this.inputIsCpf = false
                            this.usernames.email = false
                        }
                    }
                }
            }
        }
    }
</script>
