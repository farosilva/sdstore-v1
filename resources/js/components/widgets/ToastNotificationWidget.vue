<template>
<div aria-live="polite" aria-atomic="true" style="position: fixed; z-index: 1000 !important; min-height: 200px;">
  <!-- Position it -->
  <div style="position: absolute; top: 0; right: 0;">

    <!-- Then put toasts within -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <!-- <img src="..." class="rounded mr-2" alt="..."> -->
        <strong class="mr-auto">Bootstrap</strong>
        <small class="text-muted">just now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        See? Just like this.
      </div>
    </div>

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <!-- <img src="." class="rounded mr-2" alt="..."> -->
        <strong class="mr-auto">Bootstrap</strong>
        <small class="text-muted">2 seconds ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        Heads up, toasts will stack automatically
      </div>
    </div>
  </div>
</div>





    <!-- <div class="position-fixed z-index-100 bottom-0 right-0 w-0"> -->
        <!-- <div class="toast" role="alert" data-autohide="false" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Bootstrap</strong>
                <small class="text-muted">just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                See? Just like this.
            </div>
        </div> -->
        <!-- <div class="toast fade show" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto"><i class="mdi mdi-world"></i> Hello, world!</strong>
                <small class="text-muted">just now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
                This is a basic toast message.
            </div>
        </div> -->
    <!-- </div> -->
</template>

<script>
    export default {
        mounted() {
            $('.toast').toast('show')
        },
    }
</script>
