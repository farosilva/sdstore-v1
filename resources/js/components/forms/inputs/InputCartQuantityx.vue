<template>
<div class="input-cart-quantity d-flex align-items-center flex-column flex-md-row">
    <div class="input-content">
        <div class="input-group">
            <div class="input-group-prepend">
                <button @click="btnMinusQuantity" class="btn btn-minus border border border-right-0 no-focus" type="button">
                    <i class="mdi mdi-minus"></i>
                </button>
            </div>
            <input type="tel" v-model="quantity" @blur="validateQuantity" :class="['form-control border border-left-0 border-right-0 no-focus text-center bg-white', form_size]" :readonly="true">
            <div class="input-group-prepend">
                <button @click="btnPlusQuantity" class="btn btn-plus border border border-left-0 no-focus" type="button">
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div v-if="addCartButton" class="w-100 mt-2 mt-md-0 ml-0 ml-md-2">
        <div class="row justify-content-center justify-content-lg-start">
            <div class="col-8 col-md-12 col-lg-8">
                <button @click="addToCart" type="button" class="btn btn-lg btn-first btn-block rounded">
                    <i class="mdil mdil-cart h4 mb-0 mr-2"></i>
                    Adicionar
                </button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:{
            sku:{
                type: String,
                default: ''
            },
            size:{
                type: String,
                default: ''
            },
            addCartButton:{
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                quantity: 1,
                text: ''
            }
        },
        computed: {
            form_size(){
                switch (this.size) {
                    case 'small':
                        return 'form-control-sm'
                        break;
                    case 'large':
                        return 'form-control-lg'
                        break;
                    default:
                        return ''
                        break;
                }
            }
        },
        methods: {
            validateQuantity(){
                if(isNaN(this.quantity) || Number.isInteger(this.quantity) == false){
                    this.quantity = 1
                }
            },
            btnMinusQuantity(){
                if(this.quantity > 1){
                    this.quantity--
                }else{
                    this.quantity = 1
                }
            },
            btnPlusQuantity(){
                if(this.quantity > 0 && this.quantity < this.$store.state.cart.config.input_quantity_max){
                    this.quantity++
                }else{
                    this.validateQuantity()
                }
            },
            addToCart(){
                let formData = {
                    sku: this.sku,
                    quantity: this.quantity
                }

                this.$store.dispatch('cart/addToCart', formData)
                .then((response) => {
                    this.$store.dispatch('cart/getCart')
                    this.$swal({
                        title: 'Adicionado com Sucesso',
                        icon: 'success'
                    })
                })
                .catch((error) => {
                    console.log(error.response.data)
                    this.$swal({
                        title: 'Produto Indisponivel',
                        icon: 'warning',
                        border: 'solid 5px red'
                    })
                    .then(() => {
                        window.location.reload(true)
                    })
                })
            }
        },
    }
</script>

<style lang="scss">
    .input-cart-quantity{
        .btn-minus{
            border-radius: 5rem 0 0 5rem !important;
        }
        .btn-plus{
            border-radius: 0 5rem 5rem 0 !important;
        }
        .btn-minus,
        .btn-plus{
            padding: 0 .5rem;
        }
    }
</style>
