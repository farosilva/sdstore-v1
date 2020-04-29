<template>
    <div class="modal fade welcome-modal no-scrollbar" data-backdrop="static" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button @click="verifyDontShowAgain" data-dismiss="modal" class="btn position-absolute top-0 right-0 z-index-1000 no-focus">
                        <i class="mdi mdi-close"></i>
                    </button>
                    <div class="container-xl">
                        <div class="row">
                            <div class="welcome-modal-left col-12 col-lg-4 d-flex flex-column align-items-center justify-content-center mb-4">
                                <div class="welcome-modal-logotipo-content">
                                    <img src="/images/brand/logo-horizontal.png" class="welcome-modal-logotipo" alt="Logotipo">
                                </div>
                            </div>
                            <!-- LOAGING -->
                            <div v-if="loading" class="col-12 col-lg-8 d-flex flex-column">
                                <orbit-spinner class="m-auto"
                                    :animation-duration="1200"
                                    :size="75"
                                    color="#f36f21"
                                />
                                <p class="text-center pt-3">Pesquisando por {{ post_code | cepFormat }}</p>
                            </div>
                            <div v-else class="welcome-modal-right col">
                                <!-- HOME -->
                                <div v-if="sessions.home" class="welcome-default">
                                    <h4 class="text-center font-weight-bold mb-3 text-second">Bem Vindo a Santo Dom</h4>
                                    <p class="text-center mb-0">Atendemos em algumas regiões do Estado de São Paulo.</p>
                                    <div class="mx-md-5">
                                        <div class="form-group mx-3 mt-4">
                                            <the-mask :mask="['#####-###']" v-model="post_code" type="text" class="form-control form-sd" placeholder="Digite seu CEP aqui" />
                                        </div>
                                        <div class="form-group d-flex">
                                            <button @click="verifyCep" type="button" class="btn btn-second mx-auto">Continuar</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- NOT FOUND -->
                                <div v-if="sessions.notfound" class="welcome-not-found">
                                    <h5 class="text-center">Ainda não entregamos para o seu CEP :(</h5>
                                    <h5 class="text-center font-weight-bold mb-0">{{ post_code | cepFormat }}</h5>
                                    <p class="text-center small">{{ result.localidade + ' - ' + result.uf }}</p>
                                    <p class="welcome-not-found-text mt-4 text-center mb-3">A Santo Dom ainda não entrega em sua região, mas fique a vontade para conhecer nossa loja online.</p>
                                    <div class="mx-md-5">
                                        <!-- SEND EMAIL WHEN CEP AVAIABLE -->
                                        <div v-if="form_email" class="welcome-remerber-me-avaiable">
                                            <div class="input-group mb-3">
                                                <input type="text" v-model="email_remember" :class="['form-control form-sd', {'is-invalid':errors.email_remember[0]}]" placeholder="Seu e-mail" aria-label="Seu e-mail" aria-describedby="btn-welcome-remember-email">
                                                <div class="input-group-append">
                                                    <button @click="storeRemember" class="btn btn-second" type="button" id="btn-welcome-remember-email">Avise me</button>
                                                </div>
                                                <div class="invalid-feedback">
                                                    {{ errors.email_remember[0] }}
                                                </div>
                                            </div>
                                        </div>
                                        <button @click="showFormEmail" v-else class="btn btn-second btn-block">Me avise quando entregar no meu CEP</button>
                                        <a :href="linkHome" class="btn btn-first btn-block">Ir para a Loja</a>
                                        <button @click="goHome" class="btn btn-link text-dark btn-block">Alterar CEP</button>
                                    </div>
                                </div>

                                <!-- FEEDBACK AFTER SUBSCRIBE TO REMEMBER -->
                                <div v-if="sessions.feedback" class="welcome-feedback-subscribe">
                                    <div class="welcome-not-found-icon-content">
                                        <h5 class="text-center">Tudo Certo! :)</h5>
                                        <p class="welcome-feedback-text text-center mt-4">Assim que seu CEP entrar na região de atendimento enviaremos um e-mail avisando.</p>
                                    </div>
                                    <div class="mx-md-5">
                                        <a :href="linkHome" class="btn btn-first btn-block">Ir para a Loja</a>
                                        <button @click="goHome" class="btn btn-link text-dark btn-block">Alterar CEP</button>
                                    </div>
                                </div>

                                <!-- CEP AVAIABLE -->
                                <div v-if="sessions.founded" class="welcome-code-avaiable">
                                    <h5 class="text-center">Nós entregamos para o seu CEP :)</h5>
                                    <h5 class="text-center font-weight-bold mb-0">{{ post_code | cepFormat }}</h5>
                                    <p class="text-center small">{{ result.localidade + ' - ' + result.uf }}</p>
                                    <p class="welcome-not-found-text mt-4 text-center mb-3">Aproveite tudo que a Santo Dom tem para te oferecer a poucos cliques de distância!</p>
                                    <div class="mx-md-5">
                                        <a :href="linkHome" class="btn btn-first btn-block">Venha Conferir!</a>
                                        <a :href="linkAccount" class="btn btn-second btn-block">Entrar / Registrar</a>

                                        <button @click="goHome" class="btn btn-link text-dark btn-block">Alterar CEP</button>
                                    </div>
                                </div>

                                <div class="welcome-modal-dont-show-again">
                                    <div class="custom-control custom-checkbox form-sd mx-auto">
                                        <input type="checkbox" v-model="dont_show_again" class="custom-control-input" id="inputDontShowAgain">
                                        <label class="custom-control-label" for="inputDontShowAgain"><small>Não exibir novamente</small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { OrbitSpinner } from 'epic-spinners'
    export default {
        components:{ OrbitSpinner },
        props: {
            linkHome: null,
            linkAccount: null
        },
        mounted() {
            this.showModal()
        },
        data() {
            return {
                loading: false,
                sessions:{
                    home: true,
                    notfound: false,
                    feedback: false,
                    founded: false
                },
                form_email: false,
                post_code: '',
                dont_show_again: false,
                email_remember: '',
                result: '',
                errors: {
                    email_remember: '',
                }
            }
        },
        methods: {
            verifyCep(){
                if(this.post_code.length == 8){
                    this.loading = true
                    this.$store.dispatch('address/getAddressByCEP', this.post_code)
                    .then((response) => {
                        if(response.data.error){
                            this.$swal({
                                title: 'CEP Inválido',
                                icon: 'error'
                            })

                            this.loading = false
                        }else{
                            this.result = response.data
                            this.$store.dispatch('address/getCityByCode', response.data.ibge)
                            .then((response) => {
                                this.sessions = {
                                    home: false,
                                    notfound: false,
                                    feedback: false,
                                    founded: true
                                }
                                // this.$store.dispatch('session/welcomeModalSetPostCode', this.post_code)
                                // this.$store.commit('address/SET_POST_CODE', this.post_code)
                                this.loading = false
                                this.$store.dispatch('session/welcomeModalSetDontShowAgain')
                            })
                            .catch(() => {
                                this.sessions = {
                                    home: false,
                                    notfound: true,
                                    feedback: false,
                                    founded: false
                                }
                                // this.$store.dispatch('session/welcomeModalSetPostCode', '')
                                // this.$store.commit('address/SET_POST_CODE', null)
                                this.loading = false
                            })
                        }
                    })
                }
            },
            goHome(){
                this.post_code = ''
                this.sessions = {
                    home: true,
                    notfound: false,
                    feedback: false,
                    founded: false
                }
            },
            showModal(){
                if(window.location.pathname == '/'){
                    this.$store.dispatch('session/welcomeModalGetDontShowAgain')
                    .then((response) => {
                        if(response.data == false){
                            this.$store.dispatch('session/welcomeModalGetPostCode')
                            .then((response) => {
                                if(response.data == false){
                                    this.$store.dispatch('address/showWelcomeDeliveryModal')
                                }
                            })
                        }
                    })
                    .catch((error) => {
                        console.log(error.response)
                    })

                    // this.$store.dispatch('session/welcomeModalGetPostCode')
                    // .then((response) => {
                    //     if(response.data == false){
                    //         this.$store.dispatch('address/showWelcomeDeliveryModal')
                    //     }
                    // })
                }
            },
            showFormEmail(){
                this.form_email = true;
            },
            storeRemember(){
                this.loading = true
                this
                let formData = {
                    email: this.email_remember,
                    post_code: this.post_code,
                    city_code: this.result.ibge
                }
                this.$store.dispatch('address/setRememberEmail', formData)
                .then((response) => {
                    this.sessions = {
                        home: false,
                        notfound: false,
                        feedback: true,
                        founded: false
                    }
                    this.email_remember = ''
                    this.errors.email_remember = ''
                })
                .catch((error) => {
                    if(error.response.data.errors.email[0]){
                        this.errors.email_remember = error.response.data.errors.email
                    }else{
                        this.$swal({
                            title: 'E-mail não cadastrado',
                            text: 'Lamentamos o ocorrido, tente novamente',
                            icon: 'error'
                        })
                    }
                })
                .finally(() => {
                    this.loading = false
                })
            },
            verifyDontShowAgain(){
                if(this.dont_show_again){
                    this.$store.dispatch('session/welcomeModalSetDontShowAgain')
                }
            }
        },
    }
</script>

<style lang="scss">

</style>
