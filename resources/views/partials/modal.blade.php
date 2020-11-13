<!-- template for the modal component -->
<script type="text/x-template" id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-container relative bg-gray-100">
        <slot name="content"></slot>
        <button class="close-button absolute top-0 right-0 text-white -mr-20 -mt-5" @click="$emit('close')"><i class="fa-times text-30"></i></button>
      </div>
    </div>
  </transition>
</script>