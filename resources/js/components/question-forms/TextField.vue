<template>
  <div>
    <input class="px-8 py-6 bg-white border-solid border border-gray-cdced0 rounded-10 border-box w-full" type="text" v-model=textVal @change="updateText">
  </div>
</template>

<script>
export default {
  props:['text', 'leadId', 'route'],
  data: function() {
    return {
      textVal: null,
    }
  },

  created(){
    this.textVal = this.text;
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