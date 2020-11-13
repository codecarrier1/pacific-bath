<template>
  <ul class="pb-4">
    <li
      class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-10 pr-20 py-4 relative font-bold text-18 text-gray-333 bg-gray-fafafa"
      :class="{ selectedOption: index == selectedIndex }"
      v-for="(choice,index) in choices"
      :key="index"
      @click="selectOption(index)"
      >
        {{ choice['answer'] }}
        <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 right-0 absolute flex mr-8 mt-4 justify-center items-center" v-if="index == selectedIndex"></i>
      <i></i>
    </li>
  </ul>
</template>

<script>
export default {
  props:['choices', 'route', 'leadId'],
  data: function() {
    return {
      selectedIndex: null,
    }
  },

  methods:{
    selectOption(index){
      this.selectedIndex = index;
      let selectedAnswer = this.choices[index].answer;
      let data = {lead_id: this.leadId, answer: selectedAnswer};
      axios.put(this.route, data).then((response) => {
        console.log(response);
      })
      // question id is `this.$parent._props.id`
      // axios.put(url)
    }
  },

  created(){
    for (var i = 0; i < this.choices.length; i++){
      if(this.choices[i]['state']){
        this.selectedIndex = i;
        break;
      }
    }
  }
}
</script>
<style>
  .selectedOption{
    border-width: 3px;
    border-color: #00849c;
    padding: 9px 49px 9px 24px;
    box-shadow: 0 3px 6px rgba(0,0,0,.11);
    background: #fff;
  }
  .selectedOption .fa-check{
    margin-top: 8px;
  }
</style>