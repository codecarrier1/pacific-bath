<template>
  <div>
    <h2 class="font-extrabold text-24 bg-gray-ededed px-12 py-5  text-gray-333">Disposition Reporting</h2>
    <form action="" class="px-10 py-8" @submit="submitForm">
      <div class="text-field bg-gray-ebebeb">
        <label for="disposition-lname">Last Name</label>
        <input type="text" id="disposition-lname" class="bg-gray-ebebeb" v-model="form.dispositionLname" required readonly>
      </div>
      <div class="text-field">
        <label for="disposition-time">Time</label>
        <datetime type="datetime" use12-hour  input-id="disposition-time" v-model="form.appointment_time"></datetime>
      </div>
      <div class="text-field bg-gray-ebebeb">
        <label for="disposition-service">Service</label>
        <input type="text" id="disposition-service" class="bg-gray-ebebeb" v-model="form.service_name" required readonly>
      </div>
      <div class="flex justify-between">
        <div class="relative" style="width:50rem;">
          <div class="text-field">
            <label for="disposition-attendees">Who Was Present</label>
            <input type="text" id="disposition-attendees" v-model="form.attendees" required>
          </div>
        </div>
        <div class="relative" style="width:15rem;">
          <div class="text-field">
            <label for="disposition-age">Age</label>
            <input type="number" step="1" min="18" id="disposition-age" v-model="form.age" required>
          </div>
        </div>
      </div>
      <div class="relative">
        <div @click="openDispositionReporting = !openDispositionReporting" class="relative text-field cursor-pointer">
          <label>Disposition Reporting</label>
          <span class="select-opener block w-full font-normal px-6">{{ form.disposition_status.name }}</span>
          <i class="fa-caret-down absolute top-0 right-0 mt-8 mr-4"></i>
        </div>
        <ul v-if="openDispositionReporting" class="absolute border border-solid border-gray-cdced0 rounded-b-lg left-0 bg-white z-10 drop" id="reporting-drop">
          <li @click="selectDispositionReporting(disposition)" class="px-6 py-2 cursor-pointer hover:bg-blue-700" v-for="disposition in dispositionReporting" :key="disposition.id">{{ disposition.name }}</li>
        </ul>
      </div>
      <div class="text-field bg-gray-ebebeb">
        <label for="disposition-saleamount">Sale Amount</label>
        <input type="text" id="disposition-saleamount" class="bg-gray-ebebeb" v-model="form.sale_amount" required readonly>
      </div>
      <div class="text-field">
        <label for="disposition-nosale">If no Sale, the reason why</label>
        <textarea id="disposition-nosale" v-model="form.notes" cols="30" rows="10"></textarea>
      </div>
      <div class="flex flex-col mx-auto text-center pt-12" style="max-width:32rem;">
        <button type="submit" class="leading-tight font-bold border-box p-8 bg-blue-00849c text-white text-center rounded-10 mb-5">Submit</button>
        <span @click="close" class="text-blue-00849c underline cursor-pointer">Cancel</span>
      </div>
    </form>
  </div>
</template>

<script>
import Vue from 'vue'
import { Datetime } from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'

Vue.use(Datetime);

export default {
  components: {
    datetime: Datetime,
  },
  data() {
     return {
        form: {
          dispositionLname: '',
            lead_id: null,
            user_id: null,
            appointment_time: '',
            service_name: '',
            attendees: '',
            age: '',
            disposition_status: '',
            sale_amount: '',
            notes: '',
            disposition_report_id: null,
          disposition_status_id: null,

        },

        openDispositionReporting: false,
        openDispositionWhoPresent: false,

        dispositionReporting: [],
      }
    },
    created(){
      axios.get('/data/disposition-report/' + this.$root.currentLeadId).then(
          response => {
              const data = response.data;
              this.dispositionReporting = data.dispositions;
              this.form.disposition_status = this.dispositionReporting.find(disposition => {
                return disposition.id === this.$root.selectedDisposition;
              })
            this.form.dispositionLname = data.last_name;
              this.form.service_name = data.service_name;
              this.form.sale_amount = data.amount;
              this.form.user_id = data.user_id;
              this.form.appointment_time = new Date().toISOString();
              if(data.disposition_report){
                this.form.disposition_report_id = data.disposition_report.id;
                this.form.attendees = data.disposition_report.attendees;
                this.form.age = data.disposition_report.age;
                this.form.notes = data.disposition_report.notes;
                this.form.appointment_time = new Date(data.disposition_report.appointment_time).toISOString();
              }
              if(!this.form.sale_amount){
                  this.form.sale_amount = 0;
              }
          }
      )
        this.form.lead_id = this.$root.currentLeadId;
    },
    methods: {

      selectDispositionReporting(disposition){
        this.form.disposition_status = disposition;
        this.openDispositionReporting = false;
      },



      close(){
        this.$root.dispositionModal = false;
      },

      checkForm(){
        let form = document.getElementById('guide-form');
        let i = 0;
        form.querySelectorAll("input[required]").forEach(field => {
          if (this.validateField(field)) i++
        });
        i > 0 ? this.errorLogin = true : this.errorLogin = false;
      },

      submitForm(event) {
        event.preventDefault();
        const oldStatus = this.form.disposition_status;
        this.form.disposition_status_id = this.form.disposition_status.id;
        this.form.disposition_status = this.form.disposition_status.name;

        this.form.appointment_time = this.form.appointment_time.slice(0,19).replace('T', ' ');
        axios.post('/data/disposition-report', this.form).then(response => {
          if (response.status === 200 || response.status === 201) {
            this.processing = false;
            this.$root.dispositionModal = false;
            // this.$router.go();
          }
        }).catch(error => {
          console.log(error);
          this.form.disposition_status = oldStatus;
          // if (error.response.status === 422 || error.response.status === 429) {
          //   this.resetErrors();
          //   this.errors = Object.assign(this.errors, error.response.data.errors);
          //   this.hasErrors = true;
          //   this.processing = false;
          // }
        });
      },
    }
  }
</script>
<style>
  #analysis-app .text-field{
    max-width: 100%;
  }
</style>
