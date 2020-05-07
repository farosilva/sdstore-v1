<template>
    <div class="checkout-payment">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills nav-payments" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-barcode-tab" data-toggle="pill" href="#v-pills-barcode" role="tab" aria-controls="v-pills-barcode" aria-selected="true">Boleto</a>
                    <a class="nav-link disabled" id="v-pills-credit-tab" data-toggle="pill" href="#v-pills-credit" role="tab" aria-controls="v-pills-credit" aria-selected="false">Crédito</a>
                    <a class="nav-link disabled" id="v-pills-debit-tab" data-toggle="pill" href="#v-pills-debit" role="tab" aria-controls="v-pills-debit" aria-selected="false">Débito</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content pb-3" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-barcode" role="tabpanel" aria-labelledby="v-pills-barcode-tab">
                        <p class="font-weight-bold font-size-minus">A confirmação será realizada no dia útil seguinte ao pagamento.</p>
                        <p class="font-size-minus">Ao finalizar a compra você vai receber um email com o link para visualizar e imprimir seu boleto.</p>

                        <div class="d-flex align-items-center flex-column flex-sm-row">
                            <form ref="formCheckoutBoleto" action="/checkout/fechar-pedido/boleto" method="POST">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="_hash" :value="hash">
                                <button type="button" @click.once="checkoutBoleto" class="btn btn-lg btn-first mr-2">
                                    <i class="mdi mdi-lock"></i>
                                    Finalizar Pedido
                                </button>
                            </form>
                            <div>
                                <img src="/images/stamps/pagseguro.png" style="width: 5rem;" alt="Logotipo Pagseguro">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-credit" role="tabpanel" aria-labelledby="v-pills-credit-tab"></div>
                    <div class="tab-pane fade" id="v-pills-debit" role="tabpanel" aria-labelledby="v-pills-debit-tab"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <small class="ml-3 font-panton-bold">*As funções crédito e débito estão indisponíveis no momento</small>
            </div>
        </div>
    </div>
</template>

<script>
    import { OrbitSpinner } from 'epic-spinners'
    export default {
        components:{ OrbitSpinner },
        props:{
            session:{
                type: String,
                default: ''
            },
            csrf:{
                type: String,
                default: ''
            },
        },
        computed: {
            loading:function(){
                return this.$store.state.checkout.loading
            },
            hash:function(){
                return this.$store.state.checkout.hash
            }
        },
        mounted() {
            this.$store.dispatch('checkout/setSessionId', this.session)
        },
        methods: {
            checkoutBoleto(){
                this.$store.dispatch('checkout/onSenderHashReady')
                .then(() => {
                    this.$refs.formCheckoutBoleto.submit()
                })
            },
        },
    }
</script>

<style lang="scss" scoped>
    .nav-payments{
        .nav-link{
            color: #333333;
            &.active{
                color: #ffffff;
                background-color: #f36f21;
            }
            &.disabled{
                color: #cccccc;
            }
        }
    }
</style>
