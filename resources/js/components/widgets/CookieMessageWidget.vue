<template>
    <div id="cookie-section-message" :class="['d-flex align-items-center', {'close':close}]">
        <div class="container-xl">
            <div class="row">
                <div class="col-12 py-2 d-flex flex-column flex-lg-row text-light h-100">
                    <div class="cookie-section-text flex-lg-grow-1 pr-2">
                        <p class="m-0">Este site usa cookies para melhorar sua experiência de navegação e fornecer o melhor serviço possível. <br class="d-none d-lg-block"> Continuar navegando no site, você concorda com o uso deles.</p>
                    </div>
                    <div class="cookie-section-button d-flex justify-content-center mt-2">
                        <button @click="acceptCookies" class="btn btn-light btn-sm">
                            Ok, ciente!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                close:false
            }
        },
        methods: {
            acceptCookies(){
                axios.post('/session/accept-cookies')
                this.close = true
            }
        },
    }
</script>
