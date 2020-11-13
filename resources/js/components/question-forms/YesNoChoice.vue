<template>
  <ul class="flex pb-6">
    <li @click="selectOption" :class="{ selectedLogic: localActiveIndex === 0 }" class="cursor-pointer border-solid border-2 border-r border-gray-e5e5e5 rounded-l-10 px-14 py-6">{{ localLeftText }}</li>
    <li @click="selectOption" class="cursor-pointer border-solid border-2 border-l border-gray-e5e5e5 rounded-r-10 px-14  py-6" :class="{ selectedLogic: localActiveIndex === 1 }">{{ localRightText }}</li>
  </ul>
</template>

<script>
export default {
  props:['leftText', 'rightText', 'activeIndex', 'leadId', 'route'],
  data: function() {
    return {
      localLeftText: 'Yes',
      localRightText: 'No',
      localActiveIndex: 0
    }
  },

  methods:{
    selectOption(index){
      this.localActiveIndex === 0 ? this.localActiveIndex = 1 : this.localActiveIndex = 0;
      let selectedAnswer = this.localLeftText;
      if(this.localActiveIndex === 1){
        selectedAnswer = this.localRightText;
      }

      let data = {lead_id: this.leadId, answer: selectedAnswer};
      axios.put(this.route, data).then((response) => {
        console.log(response);
      })

    }
  },

  created(){
    if (this.leftText){
      this.localLeftText = this.leftText;
    }
    if (this.rightText){
      this.localRightText = this.rightText;
    }
    if (this.activeIndex){
      this.localActiveIndex = this.activeIndex;
    }
  }
}
</script>
<style>
  .selectedLogic{
    background: #00849c;
    border-color: #00849c;
    font-weight: bold;
    color: #fff;
  }
</style>