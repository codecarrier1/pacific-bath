<template>
  <div>
    <textarea class="longtextfield px-8 py-4 bg-white border-solid border border-gray-cdced0 rounded-10 border-box w-full" type="text" v-model=textVal @change="updateText"></textarea>
  </div>
</template>

<script>
export default {
  props:['text', 'route'],
  data: function() {
    return {
      textVal: null,
      leadId: null,
    }
  },

  created(){
    this.textVal = this.text;
    let currentUrl = window.location.pathname;
    this.leadId = currentUrl.substring(currentUrl.lastIndexOf('/') + 1);
  },

  methods:{
    updateText(e){
      let data = {lead_id: this.leadId, answer: e.target.value};
      axios.put(this.route, data).then((response) => {
        console.log(response);
      })
    }
  },
}
</script>

<style>
  textarea.longtextfield{
    min-height: 12rem;
    max-height: 12rem;
    min-width: 100%;
    max-width: 100%;
    resize: none;
    -webkit-appearance: none !important;
    appearance: none !important;
  }
</style>