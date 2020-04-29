<template></template>

<script>
    export default {
        props:{
            title: String,
            text: String,
            icon: String,
            confirmButtonText: {
                type: String,
                default: 'OK'
            }
        },
        mounted() {
            this.$swal({
                title: this.title,
                text: this.text,
                icon: this.icon,
                confirmButtonText: this.confirmButtonText
            })
        },
    }
</script>
