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
          <div class="border-box pl-12 apt-time-cell" :date-time=obj.datestamp>
            <strong class="block text-gray-333">{{ obj.time }}</strong>
            <span class="text-gray-999 text-14">{{ obj.weekDay }} <span class="px-2">|</span> {{ obj.month }} {{ obj.day}}</span>
          </div>
          <div class="border-box pl-8 client-cell">
            <a :href="obj.route"><strong class="block text-gray-333">{{ obj.name }}</strong></a>
            <span class="block text-gray-999 text-14">{{ obj.streetAddress }}</span>
            <span class="text-gray-999 text-14">{{ obj.city }}, {{ obj.state }} {{ obj.zip }}</span>
          </div>
          <div class="border-box pl-8 type-cell">
            <strong class="block text-gray-333"><i class="mr-6 text-24 text-gray-999" :class="[obj.type.indexOf('Walk')!== -1 ? 'fa-door-open' : 'fa-bath']"></i> {{ obj.type }}</strong>
          </div>
          <div class="border-box pl-8 disposition-cell text-14">
            <div class="relative">
              <div v-if="maybeShowDispositionDropdown(obj.dispositionID)">
                <span class="opener" @click="openDrop(index, 'dispositionDropDisplay')">
                  <!-- <i v-show="obj.dispositionID" :class="['status'+obj.dispositionID]"></i> -->
                  {{ obj.disposition }}
                  <i class="fa-caret-down"></i> </span>
                <div class="select-drop" v-if="obj.dispositionDropDisplay">
                  <ul>
                    <li v-for="item in calculateDispositions(obj.dispositionID)" v-if="obj.disposition != item['name']" @click="updateSalesDisposition(obj, item)">{{ item['name'] }}</li>
                  </ul>
                </div>
              </div>
              <div v-else>
                <!-- <i v-if="obj.dispositionID" :class="['status'+obj.dispositionID]"></i> -->
                {{ obj.disposition }}
              </div>
            </div>
          </div>
          <div class="border-box pl-8 processor-cell text-14">
            <div class="relative">
              <div v-if="showProcessorDropdown == 'false'">
                <!-- <i v-if="obj.processorID" :class="['status'+obj.processorID]"></i> -->
                {{ obj.processor }}
              </div>
              <div v-if="showProcessorDropdown == 'true'">
                <span class="opener" @click="openDrop(index, 'processorDropDisplay')">
                  <!-- <i v-if="obj.processorID" :class="['status'+obj.processorID]"></i> -->
                  {{ obj.processor }}
                  <i class="fa-caret-down"></i> </span>
                <div class="select-drop" v-if="obj.processorDropDisplay">
                  <ul>
                    <li v-for="item in processorDataList" v-if="obj.processor != item['name']" @click="updateProcessorStatus(obj, item)">{{ item['name'] }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="border-box installation-cell pr-8 pl-8 text-14">
            <div class="relative">
              <div v-if="showInstallationDropdown == 'false'">
                <!-- <i v-if="obj.installationID" :class="['status'+obj.installationID]"></i> -->
                {{ obj.installation }}
              </div>
              <div v-if="showInstallationDropdown == 'true'">
                <span class="opener" @click="openDrop(index, 'installationDropDisplay')">
                  <!-- <i v-if="obj.installationID" :class="['status'+obj.installationID]"></i>  -->
                  {{ obj.installation }}
                  <i class="fa-caret-down"></i> </span>
                <div class="select-drop" v-if="obj.installationDropDisplay">
                  <ul>
                    <li v-for="item in installationDataList" v-if="obj.installation != item['name']" @click="updateInstallationStatus(obj, item)">{{ item['name'] }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>

export default {
  props:['projects', 'title', 'showInstallationDropdown', 'showProcessorDropdown', 'showDispositionDropdown', 'installationStatuses', 'processorStatuses', 'dispositions', 'isAdmin'],
  data: function() {
    return {
      rows: [],

      days: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
      months: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],


      newDisposition: 2,
      acknowledgedDisposition: 3,

      processorDataList: [],
      dispositionDataList: [],
      installationDataList: [],

      sortColIndex: 0,
      sortDirection: 'asc',

      tableHeadings:[
        {
          class: 'apt-time-cell',
          text: 'Appointment Time',
        },
        {
          class: 'client-cell',
          text: 'Client',
        },
        {
          class: 'type-cell',
          text: 'Type',
        },
        {
          class: 'disposition-cell',
          text: 'Disposition',
        },
        {
          class: 'processor-cell',
          text: 'Processor',
        },
        {
          class: 'installation-cell',
          text: 'Installation',
        },
      ],
      rootChildren: '',
    }
  },


  created(){
    this.rootChildren = this.$root.$children;

    this.dispositionDataList = JSON.parse(this.dispositions);
    this.installationDataList = JSON.parse(this.installationStatuses);
    this.processorDataList = JSON.parse(this.processorStatuses);

    for (let obj in this.projects) {
      let item = this.projects[obj];

      let row = {};
      row['index'] = obj;
      let date = new Date(item.appointment_time);
      row['time'] = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
      row['day'] = date.getDate();
      row['weekDay'] = this.days[date.getDay()];
      row['month'] = this.months[date.getMonth()];

      row['datestamp'] = Date.parse(date);

      if (item.first_name || item.last_name){
        row['name'] = item.first_name + ' ' + item.last_name;
        row['lastname'] = item.last_name;
      }

      if (item.address){
        row['streetAddress'] = item.address;
      }

      if (item.city){
        row['city'] = item.city;
      }

      if (item.state){
        row['state'] = item.state;
      }

      if (item.zip){
        row['zip'] = item.zip;
      }

      if (item.type){
        row['type'] = item.service.name;
      }

      if (item.service.name){
        row['type'] = item.service.name;
      }

      if (item.sales_disposition){
        row['disposition'] = item.sales_disposition.name;
        row['dispositionID'] = item.sales_disposition_id;
      }

      if (item.processor_status){
        row['processor'] = item.processor_status.name;
        row['processorID'] = item.processor_status_id;
      }

      if (item.installation_status){
        row['installation'] = item.installation_status.name;
        row['installationID'] = item.installation_status_id;
      }
      if (item.route) {
        row['route'] = item.route;
      }
      if (item.id) {
        row['id'] = item.id;
      }
      row['processorDropDisplay'] = false;
      row['dispositionDropDisplay'] = false;
      row['installationDropDisplay'] = false;
      this.rows.push(row);
    }

    this.sortRows('datestamp');
  },

  mounted(){
    document.addEventListener('click', this.onClick);
    this.$emit("loaded");
    Echo.channel('sales-dash')
            .listen('DispositionStatusUpdated', (e) => {
              const lead = e.lead;
              const newStatusName = e.new_status_name;
              const index = this.rows.findIndex(row => lead.id == row.id);
              console.log(index)
              if(index > -1){
                this.rows[index].disposition = newStatusName;
                this.rows[index].dispositionID = lead.sales_disposition_id;
                this.$forceUpdate();
              }
            });
  },

  beforeDestroy() {
    document.removeEventListener('click', this.onClick);
  },

  methods:{
    maybeShowDispositionDropdown(id){
      if(this.isAdmin === 'true'){
        return true;
      }
      if(id == this.newDisposition || id == this.acknowledgedDisposition){
        return true;
      }
      return false;
    },
    calculateDispositions(id){
      if(this.isAdmin === 'true'){
        return this.dispositionDataList;
      }
      if(id == this.newDisposition){
        return [{name: 'Acknowledged', id: this.acknowledgedDisposition}];
      }
      return this.dispositionDataList;
    },
    closeDrops(){
      if (this.$root.activeSection != null){
        if (this.$root.activeSection != this._uid){
          for (var i = 0; i < this.rootChildren.length; i++){
            if (this.$root.activeSection == this.rootChildren[i]._uid){
              this.rootChildren[i]._data.rows[this.$root.openedDrop['index']][this.$root.openedDrop['value']] = false;
            }
          }
        }
        else{
          this.rows[this.$root.openedDrop['index']][this.$root.openedDrop['value']] = false;

        }
        this.$root.openedDrop['index'] = null;
        this.$root.openedDrop['value'] = '';
        this.$root.dropOpened = false;
        this.$root.activeSection = null;
      }
    },

    openDrop(index, value){
      if (this.$root.dropOpened){
        this.closeDrops();
      }
      this.rows[index][value] = true;
      this.$root.openedDrop['index'] = index;
      this.$root.openedDrop['value'] = value;
      this.$root.dropOpened = true;

      if (this.$root.activeSection != this._uid) this.$root.activeSection = this._uid;
    },

    onClick(e){
      if (!e.target.classList.contains('opener')){
        if (!e.target.parentNode.classList.contains('drop')){
          if (!e.target.parentNode.parentNode.classList.contains('select-drop')){
            this.closeDrops();
          }
        }
      }
    },

    updateSalesDisposition(leadData, newDisposition){
      leadData.disposition = newDisposition.name;
      // If the thing selected is not new and is not acknowledged
      if(newDisposition.id !== 2 && newDisposition.id !== 3){
        this.$root.currentLeadId = leadData.id;
        this.$root.selectedDisposition = newDisposition.id;
        this.$root.dispositionModal = true;
      } else {
        const url = `/data/sales-disposition/${leadData.id}/${newDisposition.id}`;
        leadData.dispositionID = newDisposition.id;
        axios.put(url);
      }
      this.closeDrops();
    },
    updateProcessorStatus(obj, item){
      obj.processor = item['name']
      obj.processorID = item['id']
      let url = '/data/processor-status/' + obj.id + '/' + item['id'];
      axios.put(url);
      this.closeDrops();
    },
    updateInstallationStatus(obj, item){
      obj.installation = item['name']
      let url = '/data/installation-status/' + obj.id + '/' + item['id'];
      obj.installationID = item['id']
      axios.put(url);
      this.closeDrops();
    },

    sort(index){
      let sortParam;
      switch(index){
        case 0:
          sortParam = 'datestamp';
          break;
        case 1:
          sortParam = 'lastname';
          break;
        case 2:
          sortParam = 'type';
          break;
        case 3:
          sortParam = 'disposition';
          break;
        case 4:
          sortParam = 'processor';
          break;
        default:
          sortParam = 'installation';
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
<style>
  .opener{
    display: block;
    border: 1px solid #ddd;
    cursor: pointer;
    padding:9px 14px;
    font-size: 14px;
    line-height: 20px;
    position: relative;
    min-height:40px;
  }
  .opener i[class^="status"]{
    margin-right: 4px;
  }
  .opener .fa-caret-down{
    position: absolute;
    right: 18px;
    top: 12px;
    line-height: 0;
    color: #333;
    font-size: 14px;
  }
  .opener .fa-caret-down:before{
    width: 0;
    height: 0;
    margin: 0;
  }
  .select-drop{
    position: absolute;
    left: 0;
    top: 39px;
    border: 1px solid #ddd;
    background: #fff;
    width: 100%;
    z-index: 1;
  }
  .select-drop li{
    cursor:pointer;
    padding:9px 14px;
    min-height: 39px;
  }
  .select-drop li:hover{
    background:#fafafa;
  }
</style>
