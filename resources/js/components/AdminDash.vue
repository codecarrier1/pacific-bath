<template>
  <section class="mb-16">
    <h3 class="font-bold text-gray-333 text-18 mb-6">{{ title }}</h3>
    <div class="box-shadow bg-white">
      <div class="text-gray-111 text-14 bg-gray-ebebeb flex items-center font-bold table-head">
        <span @click="sort(index)" v-for="(th,index) in tableHeadings"
          class="border-box cursor-pointer py-8 pl-8"
          :class="[th.class, index == 0 ? 'pl-12' : '', , index == tableHeadings.length-1 ? 'p-8' : '', index == sortColIndex ? sortDirection : '']"
          :key="'th'+index"
        >
          <span class="pr-6 relative">{{ th.text }}</span>
        </span>
      </div>
      <div class="flex flex-col">
        <div class="flex items-center py-10" v-for="(obj,index) in rows"
            :class="{ 'bg-gray-fafafa': index%2 != 0 }"
            :key="'row'+index"
            :style="{ order: obj['index'] }"
        >
          <span class="border-box pl-12 teammember-cell cell">
            <span class="flex items-center">
              <i class="notification mr-6" :class="{ visible: obj.hasUnacknowledged }"></i>
              <span v-html="obj.avatar"></span>
              <span>
                <a :href="obj.route"><strong class="block text-gray-333">{{ obj.name }}</strong></a>
                <span class="text-gray-999 text-14">{{ obj.title }}</span>
              </span>
            </span>
          </span>
          <span class="border-box pl-8 office-cell cell">
            <strong class="block text-gray-333">{{ obj.office }}</strong>
          </span>
          <span class="border-box pl-8 projectsbreakdown-cell cell">
            <span class="flex">
              <span class="w-1/2">
                <i class="text-18 text-gray-999 fa-bath"></i>
                <strong class="block text-gray-333">{{ obj.showersCount }}</strong>
                <span class="text-gray-999 text-14">Showers/BT</span>
              </span>
              <span class="w-1/2">
                <i class="text-18 text-gray-999 fa-door-open"></i>
                <strong class="block text-gray-333">{{ obj.walkInsCount }}</strong>
                <span class="text-gray-999 text-14">Walk Ins</span>
              </span>
            </span>
          </span>
          <span class="border-box pl-8 revenue-cell cell">
            <strong class="block text-gray-333">{{ obj.revenue }}</strong>
            <span class="text-gray-999 text-14">{{ obj.projectsCount }} Projects</span>
          </span>
          <span class="border-box pl-8 closerate-cell cell">
            <span class="flex">
              <span class="w-1/3">
                <i class="text-18 text-gray-999 fa-bath"></i>
                <strong class="block text-gray-333">{{ obj.showersCloseRate }}%</strong>
                <span class="text-gray-999 text-14">Showers/BT</span>
              </span>
              <span class="w-1/3">
                <i class="text-18 text-gray-999 fa-door-open"></i>
                <strong class="block text-gray-333">{{ obj.walkInsCloseRate }}%</strong>
                <span class="text-gray-999 text-14">Walk Ins</span>
              </span>
              <span class="w-1/3 pt-10">
                <i class="text-18 text-gray-999 fa"></i>
                <strong class="block text-gray-333">{{ obj.totalCloseRate }}%</strong>
                <span class="text-gray-999 text-14">Total</span>
              </span>
            </span>
          </span>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props:['sales', 'title'],
  data: function() {
    return {
      tableHeadings:[
        {
          class: 'teammember-cell',
          text: 'Team Member',
        },
        {
          class: 'office-cell',
          text: 'Office',
        },
        {
          class: 'projectsbreakdown-cell',
          text: 'Projects Breakdown',
        },
        {
          class: 'revenue-cell',
          text: 'Revenue',
        },
        {
          class: 'closerate-cell',
          text: 'Close Rate',
        },
      ],
      rows: [],
      sortColIndex: 0,
      sortDirection: 'asc',
    }
  },

  created(){
    for (let obj in this.sales) {
      let item = this.sales[obj];

      let row = {};
      row['index'] = obj;

      if (item.avatar){
        row['avatar'] = item.avatar;
      }

      if (item.name){
        row['name'] = item.name;
        row['lastname'] = item.name.split(' ')[1];
      }

      if (item.title){
        row['title'] = item.title;
      }

      if (item.office){
        row['office'] = item.office;
      }

      if (item.showers_bt_count){
        row['showersCount'] = item.showers_bt_count;
      }

      if (item.showers_bt_close_rate){
        row['showersCloseRate'] = (item.showers_bt_close_rate * 100).toFixed(0);
      }

      if (item.walk_ins_count){
        row['walkInsCount'] = item.walk_ins_count;
      }

      row['breakdown'] = row['walkInsCount']*1 + row['showersCount']*1;

      if (item.walk_ins_close_rate){
        row['walkInsCloseRate'] = (item.walk_ins_close_rate * 100).toFixed(0);
      }

      if (item.revenue){
        row['pureRevenue'] = item.revenue;
        row['revenue'] = '$' + (item.revenue*1).toFixed(0).replace(/(\d)(?=(\d{3})+$)/g, "$1,");
      }

      if (item.projects_count){
        row['projectsCount'] = item.projects_count;
      }

      if (item.total_close_rate){
        row['totalCloseRate'] = (item.total_close_rate * 100).toFixed(0);
      }
      if (item.has_unacknowledged === true) {
          row['hasUnacknowledged'] = true;
      }
      if(item.route){
        row['route'] = item.route;
      }

      this.rows.push(row);
    }

    this.sortRows('name');
  },

  mounted() {
    this.$emit("loaded");
  },

  methods:{
    sort(index){
      let sortParam;
      switch(index){
        case 0:
          sortParam = 'lastname';
          break;
        case 1:
          sortParam = 'office';
          break;
        case 2:
          sortParam = 'breakdown';
          break;
        case 3:
          sortParam = 'pureRevenue';
          break;
        default:
          sortParam = 'totalCloseRate';
      }
      if (this.sortColIndex == index){
        this.sortDirection == 'asc' ? this.sortDirection = 'desc' : this.sortDirection = 'asc';
      }
      else{
        this.sortDirection = 'asc';
        this.sortColIndex = index;
      }
      
      this.sortRows(sortParam);
    },

    sortRows(value){
      if(this.sortDirection == 'desc'){
        this.rows.sort((a,b) => (a[value] > b[value]) ? -1 : ((b[value] > a[value]) ? 1 : 0));
      }
      else{
        this.rows.sort((a,b) => (a[value] > b[value]) ? 1 : ((b[value] > a[value]) ? -1 : 0));
      }
      for (var i=0; i < this.rows.length; i++){
        this.rows[i]['index'] = i;
      }
    },
    
  },
}
</script>
