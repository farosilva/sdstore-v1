<template>
    <VueSlickCarousel class="home-carousel mx-auto" v-bind="settings">
        <img class="img-fluid" src="/images/banner/home/banner_1.jpg" alt="Banner 1">
        <img class="img-fluid" src="/images/banner/home/banner_2.jpg" alt="Banner 2">
        <img class="img-fluid" src="/images/banner/home/banner_3.jpg" alt="Banner 3">
        <img class="img-fluid" src="/images/banner/home/banner_4.jpg" alt="Banner 4">
        <img class="img-fluid" src="/images/banner/home/banner_5.jpg" alt="Banner 5">
    </VueSlickCarousel>
</template>

<script>
    import VueSlickCarousel from 'vue-slick-carousel';
    export default {
        components: { VueSlickCarousel },
        data() {
            return {
                settings: {
                    arrows:true,
                    dots:true,
                    autoplay:true,
                    autoplaySpeed: 4000,
                    fade: true,
                }
            }
        },
    }
</script>
