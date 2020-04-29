<template>
    <button @click="showWelcomeModal" type="button" v-if="loading == false" class="social-medias-links btn btn-sm btn-link py-0">
        <div v-if="post_code">
            <i class="mdi mdi-map-marker h5 mb-0"></i>
            <span>{{ post_code | cepFormat }}</span>
        </div>
        <div v-else>
            <span>Informe seu CEP</span>
        </div>
    </button>
</template>

<script>
    export default {
        props: {
            sessionPostCode: null
        },
        mounted() {
            this.getOnSession()
        },
        data() {
            return {
                loading: false,
            }
        },
        computed: {
            post_code:function(){
                return (this.$store.state.address.post_code) ?? this.sessionPostCode
            }
        },
        methods: {
            showWelcomeModal(){
                this.$store.dispatch('address/showWelcomeDeliveryModal')
            },
            getOnSession(){
                this.loading = true
                axios.post('/session/components/welcome-modal/get-post-code')
                .then((response) => {
                    this.$store.commit('address/SET_POST_CODE', response.data)
                })
                .finally(() => {
                    this.loading = false
                })
            }
        },
    }
</script>
