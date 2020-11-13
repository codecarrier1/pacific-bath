<template>
  <div class="bg-white p-12 box-shadow border-box rounded-lg mb-12">
    <h2 class="font-extrabold text-24 text-gray-333 mb-4">{{ question }}</h2>
    <slot></slot>
  </div>
</template>

<script>
export default {
  props:['question', 'id'],
  mounted() {
    this.$emit("loaded");
  },
}
</script>