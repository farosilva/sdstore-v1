<template>
    <div v-if="time" class="cart-countdown flex-none">
        <span class="font-weight-bold">{{ time | moment("mm:ss") }}</span>
        <!-- <i class="mdi mdi-help-circle text-secondary" data-toggle="tooltip" data-placement="left" title="Validade do carrinho"></i> -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                time: 0,
            }
        },
        mounted() {
            this.getExpirationTime()
        },
        methods: {
            getExpirationTime(){
                this.$store.dispatch('cart/getExpirationTime')
                .then((response) => {
                    this.time = response.data
                    this.countdown()
                })
            },
            countdown(){
                let counter = setInterval(() => {
                    if(this.time == 0){
                        clearInterval(counter)
                        window.location.reload(true)
                    }else{
                        this.time--
                    }
                }, 1000);
            }
        },
    }
</script>

<style lang="scss">

</style>
