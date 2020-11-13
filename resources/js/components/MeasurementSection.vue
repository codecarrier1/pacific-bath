<template>
  <div class="px-20 pt-20 pb-8">
    <div class="flex justify-between pb-16">
      <div class="flex justify-center items-center w-flex1/2 bg-white p-12 box-shadow border-box rounded-lg mb-12">
        <div class="relative">
          <img :src="image" width="487" height="349" alt="">
          <span v-if="visibleMarker" :id="markerId" style="width: 27px; height: 27px;" class="uppercase absolute text-white font-bold text-18 rounded-full text-center bg-blue-00849c">{{ markerLetter }}</span>
        </div>
      </div>
      <div id="measurement-fields" class="justify-center items-center flex w-flex1/2 bg-white p-12 box-shadow border-box rounded-lg mb-12">
        <ul class="px-2">
          <li>
            <span>A</span>
            <div class="field">
              <label for="opening_width">Opening Width</label>
              <input @change="updateMeasurements" type="text" id="opening_width" v-model="sizes['opening_width']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'a')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>B</span>
            <div class="field">
              <label for="tub_width">Tub Width</label>
              <input @change="updateMeasurements" type="text" id="tub_width" v-model="sizes['tub_width']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'b')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>C</span>
            <div class="field">
              <label for="right_side_wall">Side Wall</label>
              <input @change="updateMeasurements" type="text" id="right_side_wall" v-model="sizes['right_side_wall']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'c')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>C2</span>
            <div class="field">
              <label for="right_surround_width">Surround Width</label>
              <input @change="updateMeasurements" type="text" id="right_surround_width" v-model="sizes['right_surround_width']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'c')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>D</span>
            <div class="field">
              <label for="room_height">Room Height</label>
              <input @change="updateMeasurements" type="text" id="room_height" v-model="sizes['room_height']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'd')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>E</span>
            <div class="field">
              <label for="left_side_wall">Side Wall</label>
              <input @change="updateMeasurements" type="text" id="left_side_wall" v-model="sizes['left_side_wall']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'e')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>E2</span>
            <div class="field">
              <label for="left_surround_width">Surround Width</label>
              <input @change="updateMeasurements" type="text" id="left_surround_width" v-model="sizes['left_surround_width']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'e')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>F</span>
            <div class="field">
              <label for="ceiling_panel">Ceiling Panel</label>
              <input @change="updateMeasurements" type="text" id="ceiling_panel" v-model="sizes['ceiling_panel']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'f')" @focusout="focus($event, false)">
            </div>
          </li>
          <li>
            <span>G</span>
            <div class="field">
              <label for="soffit">Soffit</label>
              <input @change="updateMeasurements" type="text" id="soffit" v-model="sizes['soffit']" @keypress="isNumber($event)" maxlength="6" @focusin="focus($event, true, 'g')" @focusout="focus($event, false)">
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div class="flex">
      <div style="width: 36rem;" class="mr-16">
        <strong class="block text-18 mb-6">Type of Conversion:</strong>
        <ul>
          <li
            class="cursor-pointer rounded-10 bg-gray-fafafa border-2 border-solid border-gray-e5e5e5 mb-4 pl-10 pr-20 py-4 relative bg-gray-fafafa"
            :class="{ selectedOption: index == selectedTypesConversion }"
            v-for="(choice,index) in typesConversion"
            :key="index"
            @click="selectConversionType(index, choice['id'])"
            >
              {{ choice['name'] }}
              <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 right-0 absolute flex mr-8 mt-4 justify-center items-center" v-if="index == selectedTypesConversion"></i>
            <i></i>
          </li>
        </ul>
      </div>

      <div style="width: 36rem;" class="mr-16">
        <strong class="block text-18 mb-6">Type of Property:</strong>
        <ul>
          <li
            class="cursor-pointer rounded-10 bg-gray-fafafa border-2 border-solid border-gray-e5e5e5 mb-4 pl-10 pr-20 py-4 relative bg-gray-fafafa"
            :class="{ selectedOption: index == selectedTypesProperty }"
            v-for="(choice,index) in typesProperty"
            :key="index"
            @click="selectPropertyType(index, choice['id'])"
            >
              {{ choice['name'] }}
              <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 right-0 absolute flex mr-8 mt-4 justify-center items-center" v-if="index == selectedTypesProperty"></i>
            <i></i>
          </li>
        </ul>
      </div>

      <div style="width: 21rem;">
        <strong class="block text-18 mb-6">New pan size:</strong>
        <ul id="new-pan-size">
          <li class="mb-4 bg-white">
            <label for="pan_width">Width</label>
            <input @change="updateMeasurements" type="text" id="pan_width" v-model="sizes['pan_width']" @keypress="isNumber($event)" maxlength="6">
          </li>
          <li class="bg-white">
            <label for="pan_height">Depth</label>
            <input @change="updateMeasurements" type="text" id="pan_height" v-model="sizes['pan_height']" @keypress="isNumber($event)" maxlength="6">
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['measurement', 'image', 'conversionTypes', 'lead', 'propertyTypes'],
  data: function() {
    return {
      typesConversion: [],
      selectedTypesConversion: null,

      typesProperty: [],

      selectedTypesProperty: null,

      sizes:{
        opening_width : '120',
        tub_width : '120',
        right_side_wall : '120',
        right_surround_width : '120',
        room_height : '120',
        left_side_wall : '120',
        left_surround_width : '120',
        ceiling_panel : '120',
        soffit : '120',
        pan_width : '120',
        pan_height : '120'
      },


      visibleMarker: false,
      markerLetter: 'a',
      markerId: 'marker-a',
    }
  },


  methods:{

      selectConversionType(index, id){
          this.selectedTypesConversion = index;
          let data = {};
          data['conversion_type_id'] = id;
          axios.put('/data/conversion-type/' + this.lead.id, data);
      },
      selectPropertyType(index, id){
          this.selectedTypesProperty = index;
          let data = {};
          data['property_type_id'] = id;
          axios.put('/data/property-type/' + this.lead.id, data);
      },
    updateMeasurements(event){
      let data = {};
      let value = event.target.value;
      let name = event.target.id;
      data[name] = value;
      axios.put('/data/measurement/' + this.measurement.id, data)
    },

    isNumber: function(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();;
      } else {
        return true;
      }
    },

    focus (event, value, letter) {
      if (value){
        this.visibleMarker = true;
        this.markerLetter = letter;
        this.markerId = 'marker-' + letter;
        event.target.parentNode.classList.add('focused');
      }
      else{
        this.visibleMarker = false;
        event.target.parentNode.classList.remove('focused');
      }
    },
  },

  created(){
      this.typesConversion = this.conversionTypes;
      this.typesProperty = this.propertyTypes;
      if(this.lead.conversion_type_id){
          // The index is one lower than the id
          this.selectedTypesConversion = this.lead.conversion_type_id - 1;
      }
      if(this.lead.property_type_id){
          // The index is one lower than the id
          this.selectedTypesProperty = this.lead.property_type_id - 1;
      }
      for (let [key, value] of Object.entries(this.sizes)) {
          if(this.measurement.hasOwnProperty(key)){
            this.sizes[key] = this.measurement[key];
          }
      }
    for (var i = 0; i < this.typesConversion.length; i++){
      if(this.typesConversion[i]['state']){
        this.selectedTypesConversion = i;
        break;
      }
    }

    for (var i = 0; i < this.typesProperty.length; i++){
      if(this.typesProperty[i]['state']){
        this.selectedTypesProperty = i;
        break;
      }
    }
  },

  mounted() {
    this.$emit("loaded");
  },
}
</script>

<style>
  #measurement-fields ul{
    columns: 2;
  }
  #measurement-fields li{
    -webkit-column-break-inside: avoid;
    page-break-inside: avoid;
    break-inside: avoid;
    display: flex;
    margin-bottom: 1rem;
    padding: 0 1rem;
    align-items: center;
  }
  #measurement-fields span{
    font-weight: bold;
    font-size: 1.8rem;
    width: 3.3rem;
  }
  #new-pan-size li,
  #measurement-fields .field{
    border: .1rem solid #cdced0;
    width: 20.8rem;
    border-radius: 5px;
    overflow: hidden;
  }
  #measurement-fields .focused{
    box-shadow: 0 0 8px #006fcd;
    border-color: transparent;
  }
  #new-pan-size li{
    width: auto;
  }
  #new-pan-size input,
  #measurement-fields input{
    padding: .2rem 1.9rem .8rem;
    width: 100%;
    box-sizing: border-box;
    color: #111;
  }
  #new-pan-size label,
  #measurement-fields label{
    cursor: pointer;
    text-transform: uppercase;
    color: #8e9c9e;
    font-size: 1.1rem;
    padding: 0 1.9rem;
    font-weight: bold;
    width: 100%;
    box-sizing: border-box;
    display: block;
    padding-top: 7px;
  }
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
  #marker-a{
    left: 234px;
    top: 85px;
  }
  #marker-b{
    left: 234px;
    top: 235px;
  }
  #marker-c{
    left: 408px;
    top: 120px;
  }
  #marker-d{
    left: -6px;
    top: 160px;
  }
  #marker-e{
    left: 65px;
    top: 120px;
  }
  #marker-f{
    left: 220px;
    top: 46px;
  }
  #marker-g{
    left: 256px;
    top: 10px;
  }
</style>
