<template>
  <div class="flex justify-between mb-16">
    <div class="bg-white p-12 box-shadow border-box w-flex1/3 rounded-lg">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-gray-333 text-18 font-bold">Project Breakdown</h3>
        <span class="uppercase text-gray-999 text-12">{{ currentDate }}</span>
      </div>
      <div class="flex items-center">
        <div class="mr-12 w-44 h-40">
          <vc-donut :size="100" :sections="sections">
            <div class="flex flex-col items-center justify-center">
              <strong class="text-gray-111 text-30 leading-none font-bold pt-4">{{ totalCount }}</strong>
              <span class="text-14 text-gray-999">Total</span>
            </div>
          </vc-donut>
        </div>
        <ul class="text-gray-999">
          <li v-for="(item,index) in chartsData" class="flex items-center my-2">
            <span style="width:8px;height:8px;" class="rounded-full mr-2" :class="[(index == 0) ? 'bg-blue-00849c' : 'bg-blue-85c6e4']"></span>
            <span class="text-gray-333 mr-2 font-bold">{{ item['count'] }}</span>
            <span>{{ item['name'] }}</span>
          </li>
        </ul>
      </div>
    </div>
    <div class="bg-white p-12 box-shadow border-box w-flex1/3 rounded-lg">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-gray-333 text-18 font-bold">Revenue</h3>
        <span class="uppercase text-gray-999 text-12">{{ currentDate }}</span>
      </div>
      <strong class="text-gray-111 text-42 block font-bold mb-4">{{ revenue }}</strong>
      <span class="text-gray-999 text-16 block">{{ prevMonth }}: {{ prevRevenue }}</span>
    </div>
    <div class="bg-white p-12 box-shadow border-box w-flex1/3 rounded-lg">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-gray-333 text-18 font-bold">Close Rate</h3>
        <span class="uppercase text-gray-999 text-12">{{ currentDate }}</span>
      </div>
      <ul class="text-gray-999 pt-2 text-15 whitespace-no-wrap">
        <li class="flex mb-4 items-center" v-for="item in chartsData">
          <span class="w-1/3 border-box pr-4 text-right">{{ item['name'] }}</span>
          <span class="w-1/3 bg-gray-ebebeb h-4"><span :style="{ width: calculateRate(item['closed'],item['count']) }" class="block bg-blue-00849c h-full"></span></span>
          <span class="w-1/3 border-box pl-4">
            <span>{{calculateRate(item['closed'],item['count'])}}</span>
            <span>({{ item['closed']}}/{{item['count']}})</span>
          </span>
        </li>
        <li class="flex items-center font-bold text-gray-333">
          <span class="w-1/3 border-box pr-4 text-right">Average</span>
          <span class="w-1/3 bg-gray-ebebeb h-4"><span :style="{ width: calculateRate(totalClosed,totalCount) }" class="block bg-blue-00849c h-full"></span></span>
          <span class="w-1/3 border-box pl-4">
            <span>{{ calculateRate(totalClosed,totalCount)}}</span>
            <span>({{ totalClosed }}/{{ totalCount }})</span>
          </span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import Vue from 'vue';
import Donut from 'vue-css-donut-chart';
import 'vue-css-donut-chart/dist/vcdonut.css';
Vue.use(Donut);

export default {
    props: ['url'],
  data: function() {
    return {
      chartsData: [
        { name:'', closed: '', count:''},
        { name:'', closed: '', count:''},
      ],
      revenue: '$',
      prevRevenue: '$',
      totalClosed: 0,
      totalCount: 0,
      sections:[{ value: 75, color:"#00849c" }, { value: 25, color:"#85c6e4" }],
      months: ['January','February','March','April','May','June','July','August','September','October','November','December']
    }
  },
  computed: {
    currentDate: function () {
      var d = new Date(),
          month = d.getMonth(),
          year = d.getFullYear();

      return this.months[month] + ' ' + year;
    },

    prevMonth: function () {
      return this.months[(new Date().getMonth() - 1)];
    },

  },
  created() {
    axios.get(this.url).then(response => {
      this.chartsData = response.data['close_rate'];
      this.revenue = '$' + (response.data['revenue']['this_month']*1).toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,");
      this.prevRevenue = '$' + (response.data['revenue']['last_month']*1).toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,");
      for (var i = 0; i < this.chartsData.length; i++){
        this.totalClosed += this.chartsData[i]['closed']*1;
        this.totalCount += this.chartsData[i]['count']*1;
      }

      for (var i = 0; i < this.chartsData.length; i++){
        let section = this.sections[i];
        let data = this.chartsData[i].count;
        if(typeof section !== 'undefined'){
          if(typeof data !== 'undefined'){
            this.sections[i].value = this.chartsData[i]['count']/this.totalCount*100;
          }
        }

      }
    })
    .catch(e => {
        console.error(e)
    });
  },

  mounted() {
    this.$emit("loaded");
  },

  methods:{
    calculateRate(closerate, breakdown){
      const decimal = parseFloat(closerate / breakdown);
      if(isNaN(decimal)){
        return '0%';
      }
      return ( decimal * 100).toFixed(0) + '%';
    },
  }
}
</script>
