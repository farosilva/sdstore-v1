<template>
    <div class="cart-widget">
        <div @click="toggleList" class="cart-widget-icon">
            <i   class="mdil mdil-cart h2 mb-0"></i>
            <span class="badge-cart badge badge-first badge-pill">{{ num_items }}</span>
        </div>
        <div :class="['cart-widget-products bg-white', {'visible':visible}]">
            <cart-products-list-widget :route="route"></cart-products-list-widget>
        </div>
    </div>
</template>

<script>
    import CartProductListWidget from './CartProductsListWidget'
    export default {
        components: {CartProductListWidget},
        props: { route:String },
        mounted() {
            this.$store.dispatch('cart/getCart')
        },
        computed: {
            visible:function(){
                return this.$store.state.cart.component.cartListHeader
            },
            num_items:function(){
                return this.$store.state.cart.cart.resume.num_items
            }
        },
        methods: {
            toggleList(){
                let visible = (this.visible) ? false : true
                this.$store.commit('cart/SET_CART_LIST_HEADER', visible)
            }
        },
    }
</script>

<style lang="scss">

</style>
