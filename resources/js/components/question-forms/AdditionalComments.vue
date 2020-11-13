<template>
  <div class="border-solid border border-gray-cdced0 rounded-10 overflow-hidden">
    <label class="px-8 pt-4 pb-2 block cursor-pointer uppercase text-blue-8e9c9e text-11 font-bold" :for="['texarea'+$parent._props.id]">{{ label }}</label>
    <textarea
      class="addcoments px-8 overflow-auto w-full border-box"
      :name="['texarea'+$parent._props.id]"
      :id="['texarea'+$parent._props.id]" cols="30" rows="10"
      v-model=textVal
      @change="updateText"
    ></textarea>
  </div>
</template>

<script>
export default {
  props:['addcoments', 'route', 'leadId', 'helpText'],
  data: function() {
    return {
      textVal: null,
      label: "Additional Comments",
    }
  },

  created(){
    this.textVal = this.addcoments;
    if(this.helpText){
      this.label = this.helpText;
    }
  },

  methods:{
    updateText(e){
      let data = {lead_id: this.leadId, comment: e.target.value};
      axios.put(this.route, data).then((response) => {
        console.log(response);
      })

    //   // question id is `this.$parent._props.id`
    //   // axios.put(url)
    }
  },
}
</script>
<style>
  textarea.addcoments{
    min-height: 7rem;
    max-height: 7rem;
    min-width: 100%;
    max-width: 100%;
    resize: none;
  }
</style>