<template>
    <div :class="['product-vertical-grid border bg-white rounded', {'mx-auto':center}]">
        <div class="product-vertical-top rounded-top d-flex justify-content-center align-items-center">
            <div class="product-vertical-image">
                <a :href="productLink" class="text-decoration-none">
                    <v-lazy-image
                        class="img-fluid rounded-top"
                        :src="image"
                        src-placeholder="/images/addons/loading-2.gif"
                        :alt="productName"/>
                </a>
            </div>
            <div v-if="config.show_label_sale" class="product-vertical-label-sale position-absolute top-0 left-0 z-index-1000 mt-1 ml-1">
                <h5 class="m-0">
                    <span class="badge badge-primary">Novo</span>
                </h5>
            </div>
            <div v-if="false" class="product-quickview">
                <button @click="showQuickview" type="button" class="btn btn-sm btn-second no-focus rounded-circle">
                    <i class="mdi mdi-eye-outline"></i>
                </button>
            </div>
        </div>
        <div class="product-vertical-bottom">
            <div class="product-vertical-infos-content">
                <div class="product-name mb-1">
                    <span class="text-second font-panton-bold">{{ productName }}</span>
                </div>
                <div class="product-info d-flex align-items-center justify-content-around">
                    <div class="product-details-pack">
                        <p class="small m-0">{{ productDescription }}</p>
                    </div>
                    <div class="product-rating text-warning small" v-if="config.show_ratting">
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star-half"></i>
                    </div>
                </div>
                <div class="product-price mb-1 mt-1">
                    <p v-if="lastPrice > 0" class="mb-0 price-old">{{ lastPrice | moneyFormat }}</p>
                    <p class="mb-0 price-new">{{ currentPrice | moneyFormat }}</p>
                </div>
                <div class="product-actions d-flex">
                    <div class="product-actions-button w-100 d-flex justify-content-around align-items-center">
                        <!-- <button @click="addToFavorite" class="btn btn-sm btn-first no-focus rounded-circle">
                            <i class="mdi mdi-heart-outline"></i>
                        </button> -->
                        <button @click="addToCart" class="btn btn-sm btn-first no-focus rounded-pill">
                            <i class="mdi mdi-cart"></i>
                            Adicionar ao Carrinho
                        </button>
                    </div>

                    <!-- <input-cart-quantity size="small"></input-cart-quantity> -->

                    <div class="input-group mr-1 d-none">
                        <div class="product-action-button-minus input-group-append">
                            <button @click="btnMinusQuantity" class="btn btn-sm no-focus rounded-pill-left" type="button" id="button-addon2">
                                <i class="mdi mdi-minus"></i>
                            </button>
                        </div>
                        <input type="tel" v-model="quantity" @blur="validateQuantity" class="form-control form-control-sm no-focus input-quantity">
                        <div class="product-action-button-plus input-group-append">
                            <button @click="btnPlusQuantity" class="btn btn-sm no-focus" type="button" id="button-addon2">
                                <i class="mdi mdi-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            center:{
                type: Boolean,
                default: true
            },
            srcImage:{
                type: String,
                default: 'sem-gluten/coxinha-frango/coxinha-frango_3.jpg'
            },
            productCode:{
                type: String,
                default: ''
            },
            productName:{
                type: String,
                default: 'Name of Product'
            },
            productDescription:{
                type: String,
                default: 'Some text here'
            },
            lastPrice:{
                type: Number,
                default: 0.00
            },
            currentPrice:{
                type: Number,
                default: 0.00
            },
        },
        data() {
            return {
                config:{
                    show_label_sale: false,
                    show_ratting: false,
                    max_quantity: 99,
                },
                quantity: 1
            }
        },
        computed:{
            image(){
                return '/images/products/small/' + this.srcImage
            },
            productLink(){
                return '/produtos/' + this.productCode + '-' + this.productName.toString().toLowerCase().replace(/ /g, '-')
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
                if(this.quantity > 0 && this.quantity < this.config.max_quantity){
                    this.quantity =+ 5
                }else{
                    this.quantity = 1
                }
            },
            showQuickview(){
                this.$swal({
                    title: 'Concluído!',
                    text: 'Exibindo Detalhes do Produto ' + this.productCode,
                    icon: 'info',
                    iconHtml: '<i class="mdi mdi-blender"></i>',
                })
            },
            addToFavorite(){
                this.$swal({
                    title: 'Concluído!',
                    text: 'Adicionado aos Favoritos',
                    icon: 'success',
                    iconHtml: '<i class="mdi mdi-heart"></i>',
                })
            },
            addToCart(){
                let formData = {
                    sku: this.productCode,
                    quantity: 1
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

                // this.$swal({
                //     title: 'Concluído!',
                //     text: 'Adicionado ao Carrinho',
                //     icon: 'success',
                //     iconHtml: '<i class="mdi mdi-cart"></i>',
                // })
            },
        },
    }
</script>
