<template>
    <div>
        <label v-bind:for="inputId" class="font-size-minus mb-1 form-required">CEP</label>
        <div class="is-invalid d-flex">
            <div>
                <the-mask type="tel" v-model="post_code" :mask="['#####-###']" v-bind:id="inputId" :name="inputName" :class="['input-post-code form-control form-sd', {'is-invalid':errorInput}]" />
            </div>
            <button @click="getAddress" type="button" class="btn btn-second rounded-right no-focus">
                <div v-if="loading" class="spinner-border spinner-border-sm text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <i v-else class="mdi mdi-magnify"></i>
            </button>
        </div>
        <div class="invalid-feedback">
            {{ errorInput }}
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            oldInput: null,
            errorInput: null,
            postCodeSession: null,
            postCodeType: {
                type: String,
                default: 'I'
            }
        },
        mounted() {
            if(this.postCodeSession && this.postCodeType == 'D'){
                this.post_code = this.postCodeSession
                this.getAddress()
            }
        },
        data() {
            return {
                loading: false,
                post_code: this.oldInput,
            }
        },
        computed: {
            inputName:function(){
                return 'post_code'
            },
            inputId:function(){
                return 'inputPostCode'
            },
        },
        methods: {
            getAddress(){
                this.loading = true
                this.$store.dispatch('address/getAddressByCEP', this.post_code)
                .then((response_api) => {
                    if(response_api.data.erro){
                        this.$swal({
                            title: 'CEP Inválido',
                            text: 'CEP ' + this.post_code.substring(0,5) + '-' + this.post_code.substring(5,8) + ' não foi encontrado.',
                            icon: 'error',
                            confirmButtonText: 'Tentar outro CEP'
                        })
                        this.loading = false
                    }else{
                        this.$store.dispatch('address/getCityByCode', response_api.data.ibge)
                        .then(() => {
                            if(this.postCodeType == 'D'){
                                $('#inputStreetNameDelivery').val(response_api.data.logradouro)
                                $('#inputDistrictDelivery').val(response_api.data.bairro)
                                $('#inputCityDelivery').val(response_api.data.localidade)
                                $('#inputStateDelivery').val(response_api.data.uf)
                                $('#inputCityCodeDelivery').val(response_api.data.ibge)
                            }else if(this.postCodeType == 'I'){
                                $('#inputStreetNameInvoice').val(response_api.data.logradouro)
                                $('#inputDistrictInvoice').val(response_api.data.bairro)
                                $('#inputCityInvoice').val(response_api.data.localidade)
                                $('#inputStateInvoice').val(response_api.data.uf)
                                $('#inputCityCodeInvoice').val(response_api.data.ibge)
                            }
                        })
                        .catch(() => {
                            this.$swal({
                                title: 'Fora da Cobertura',
                                text: 'Infelizmente ainda não atendemos sua região',
                                icon: 'error',
                                confirmButtonText: 'Tentar outro CEP'
                            })
                        })
                        .finally(() => {
                            this.loading = false
                        })
                    }
                })
                .catch((error) => {
                    console.log(error.response)
                })
            },
        },
    }
</script>

<style>

</style>
