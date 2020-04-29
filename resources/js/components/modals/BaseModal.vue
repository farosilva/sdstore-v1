<template>
    <div class="modal fade no-scrollbar" :id="modalName" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div :class="['modal-dialog modal-dialog-centered', {'modal-full':modalFull}]" role="document">
            <div class="modal-content rounded-0">
                    <button v-if="buttonClose" class="btn btn-second position-absolute right-0 z-index-1000 no-focus" data-dismiss="modal">
                        <i class="mdi mdi-close"></i>
                    </button>
                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            modalName:{
                type: String,
                default: ''
            },
            modalFull:{
                type: Boolean,
                default: true
            },
            buttonClose:{
                type: Boolean,
                default: false
            }
        },
        mounted() {
            // $("#"+this.modalName).modal('show')
        },
    }
</script>

<style>
    .modal-full{
        max-width: 1140px !important;
        padding: 0 1rem !important;
    }
</style>
