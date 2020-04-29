<template>
    <div>
        <slick class="slide-for mb-4" :options="slickOptions" ref="slickSetting1">
            <img v-for="(image, index) in images" :key="index"
                :src="['/images/products/large/'+image]" class="img-fluid rounded" alt="Produto">
        </slick>
        <slick class="slide-nav" :options="slickOptions2" ref="slickSetting2">
            <img v-for="(image, index) in images" :key="index"
                :src="['/images/products/large/'+image]" class="img-fluid" alt="Produto">
        </slick>
    </div>
</template>

<script>
    import Slick from "vue-slick";
    export default {
        components: { Slick },
        props:{
            srcImages:{
                type: String,
                default: ''
            },
        },
        data() {
            return {
                images: JSON.parse(this.srcImages)
            }
        },
        computed: {
            slickOptions() {
                return {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slide-nav',
                }
            },
            slickOptions2() {
                return {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    navs: false,
                    arrows: true,
                    autoplay: true,
                    speed: 500,
                    infinite: true,
                    cssEase: "linear",
                    focusOnSelect: true,
                    pauseOnHover: true,
                    centerMode: true,
                    asNavFor: '.slide-for',
                }
            }
        },
    }
</script>

<style lang="scss">
    .slide-nav{
        .slick-slide{
            margin: 0 10px;
            img{
                opacity: .5;
                transform: scale(0.8);
                transition: all .5s;
            }
            &.slick-center{
                img{
                    opacity: 1 !important;
                    transform: scale(1);
                }
            }
        }
    }
</style>
