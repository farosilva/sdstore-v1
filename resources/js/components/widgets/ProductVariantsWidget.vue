<template>
    <div>
        <div v-for="(product, index) in products" :key="index" class="custom-control custom-radio xcustom-control-inline form-sd cursor-pointer">
            <input @change="redirectTo(product)" type="radio" :id="['productVariants' + index]" name="product_variants" :checked="(sku == product.sku) ? true : false" class="custom-control-input">
            <label :class="['custom-control-label cursor-pointer', {'text-muted line-through':product.avaiable == false}]" :for="['productVariants' + index]">
                {{ product.package_label }}
                <small v-if="product.avaiable == false">(Indisponível)</small>
            </label>
        </div>
        <!-- <div v-for="(product, index) in products" :key="index" class="custom-control custom-radio xcustom-control-inline form-sd cursor-pointer">
            <input @change="redirectTo(product)" type="radio" :id="['productVariants' + index]" name="product_variants" :checked="(sku == product.sku) ? true : false" class="custom-control-input">
            <label :class="['custom-control-label cursor-pointer', {'text-muted line-through':product.stock.avaiable == false}]" :for="['productVariants' + index]">
                {{ product.qtde_pack_label }}
                <small v-if="product.stock.avaiable == false">(Indisponível)</small>
            </label>
        </div> -->
    </div>
</template>

<script>
    export default {
        props:{
            variants:{
                type: String,
                default: ''
            },
            sku:{
                type: String,
                default: ''
            },
        },
        data() {
            return {
                products: JSON.parse(this.variants)
            }
        },
        methods: {
            redirectTo(prod){
                let link = '/produtos/' + prod.sku + '-' + prod.name.toLowerCase().replace(/ /g, '-')
                window.location.assign(link)
            }
        },
    }
</script>

<style>

</style>
