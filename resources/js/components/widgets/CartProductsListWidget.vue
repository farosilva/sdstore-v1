<template>
    <div v-if="cart.resume.num_items > 0">
        <ul class="cart-products-list nav flex-column no-scrollbar z-index-1000">
            <div class="scroller">
                <li class="cart-products-item nav-item px-2 py-1" v-for="(item, index) in cart.items" :key="index">
                    <div class="cart-product-grid-horizontal border-bottom d-flex h-100 w-100">
                        <div class="cart-product-grid-horizontal-left">
                            <div class="cart-product-grid-horizontal-image">
                                <a href="#">
                                    <v-lazy-image
                                        class="img-fluid rounded"
                                        :src="'/images/products/small/' + item.options.image"
                                        src-placeholder="/images/addons/loading-2.gif"
                                        :alt="item.name"/>
                                </a>
                            </div>
                        </div>
                        <div class="cart-product-grid-horizontal-right d-flex flex-column justify-content-between px-2 py-1">
                            <div class="product-name">
                                <p class="m-0">{{ item.name }}</p>
                            </div>
                            <div class="product-info mb-2 d-flex align-items-center">
                                <span class="badge badge-second mr-2">{{ item.qty }}x</span>
                                <span class="product-info-price font-weight-bold">{{ item.price | moneyFormat }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </ul>
        <div class="p-2">
            <div class="d-flex justify-content-between">
                <span>Subtotal: </span>
                <span class="font-panton-bold">R$ {{ cart.resume.subtotal }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Frete: </span>
                <span class="font-panton-bold">R$ {{ cart.resume.frete }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Taxas: </span>
                <span class="font-panton-bold">R$ 0,00</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Total: </span>
                <span class="font-panton-bold text-second">R$ {{ cart.resume.total }}</span>
            </div>

            <p v-if="subtotal < 80" class="py-2 font-size-minus mb-0 text-center">Faltam <span class="text-secondary font-panton-bold">{{ (80 - subtotal) | moneyFormat }}</span> para fechar seu pedido</p>

            <a href="/carrinho" class="btn btn-block btn-first mt-3 rounded">
                Ver Carrinho
            </a>
            <div v-if="subtotal > 79.99">
                <div v-if="route !== 'checkout'">
                    <a href="/checkout" @click.prevent="doCheckout()" class="btn btn-lg btn-block btn-second mt-2 rounded">
                        Fechar Pedido
                    </a>
                    <form id="checkout-form" action="/checkout" method="POST" style="display: none;">
                        <input type="hidden" :value="csrf" name="_token">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="p-2">
        <h2 class="text-center m-0 py-2">
            <i class="mdil mdil-cart text-muted"></i>
        </h2>
        <h5 class="text-center">
            Seu carrinho está vazio
        </h5>
    </div>
</template>

<script>
    export default {
        props: { route:String },
        data() {
            return {
                productImage: '/images/products/small/no-image.png',
                productName: 'Name of Product',
            }
        },
        computed: {
            cart:function(){
                return this.$store.state.cart.cart
            },
            csrf:function(){
                return $('meta[name="csrf-token"]').attr('content')
            },
            subtotal:function(){
                return this.cart.resume.subtotal.replace(/,/g, '.')
            }
        },
        methods: {
            getCart(){
                this.$store.dispatch('cart/getCart')
                .then((response) => {
                    this.cart = {
                        items: response.data.items,
                        resume: response.data.resume
                    }
                })
                .catch((error) => {
                    console.log(error.response.data)
                })
            },
            doCheckout(){
                $("#checkout-form").submit();
            }
        },
    }
</script>

<style lang="scss">
</style>
