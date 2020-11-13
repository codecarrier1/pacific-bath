<template>
  <div class="w-flex1/2 pl-4 border-box">
    <h2 class="text-32 font-bold text-gray-333 mb-10">HOA Information:</h2>
    <div class="box-shadow rounded-lg bg-white text-18 px-12 pt-6 pb-12">
      <template v-if="!formSaved">
        <div class="w-full max-w-4xl">
          <h3 class="text-18 text-gray-333 font-bold mb-4">Is there a HOA?</h3>
          <div
            class="flex justify-between font-bold text-18 text-gray-333 text-center mb-12"
            id="hoa-yesno"
          >
            <span
              class="cursor-pointer w-flex1/2 bg-gray-fafafa border-solid border-gray-e5e5e5 border-2 rounded-lg py-4"
              v-on:click="hasContactInfo = 1"
              v-bind:class="{ 'text-white bg-blue-00849c border-blue-00849c': hasContactInfo === 1 }"
            >Yes</span>
            <span
              class="cursor-pointer w-flex1/2 bg-gray-fafafa border-solid border-gray-e5e5e5 border-2 rounded-lg py-4"
              v-on:click="hasContactInfo = 0"
              v-bind:class="{ 'text-white bg-blue-00849c border-blue-00849c': hasContactInfo === 0 }"
            >No</span>
          </div>

          <template v-if="hasContactInfo">
            <h3 class="text-18 text-gray-333 font-bold mb-4">
              HOA Contact
              Information:
            </h3>
            <form @submit.prevent="submitForm">
              <div class="text-field">
                <label for="name">Contact Name</label>
                <input type="text" id="name" name="name" v-model="form.name" />
              </div>
              <div
                v-if="hasErrors && errors.name"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4"
                role="alert"
              >
                <span class="block sm:inline">{{ errors.name.join(', ') }}</span>
              </div>
              <div class="text-field">
                <label for="company">Property Management Company</label>
                <input type="text" id="company" name="company" v-model="form.company" />
              </div>
              <div
                v-if="hasErrors && errors.company"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4"
                role="alert"
              >
                <span class="block sm:inline">{{ errors.company.join(', ') }}</span>
              </div>
              <div class="text-field">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" v-model="form.phone" />
              </div>
              <div
                v-if="hasErrors && errors.phone"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4"
                role="alert"
              >
                <span class="block sm:inline">{{ errors.phone.join(', ') }}</span>
              </div>
              <div class="text-field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" v-model="form.email" />
              </div>
              <div
                v-if="hasErrors && errors.email"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4"
                role="alert"
              >
                <span class="block sm:inline">{{ errors.email.join(', ') }}</span>
              </div>
              <div class="flex flex-row-reverse mb-12">
                <button
                  type="submit"
                  class="cursor-pointer w-flex1/2 bg-blue-00849c text-white border-solid border-blue-00849c border-2 rounded-lg py-4"
                >Save</button>
              </div>
            </form>
          </template>
        </div>
      </template>
      <template v-else>
        <div class="w-full">
          <div
            class="bg-green-100 border-t-4 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
            role="alert"
          >
            <div class="flex">
              <div class="py-2">
                <svg
                  class="fill-current h-6 w-6 text-green-500 mr-4"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                  />
                </svg>
              </div>
              <div>
                <p class="font-bold">Success!</p>
                <p class="text-sm">
                  Homeowners contact information has been
                  saved.
                </p>
              </div>
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    action: {
      type: String,
      default: null
    },
    existingContact: {
      type: Object,
      default: null
    }
  },

  data() {
    return {
      form: {
        name: null,
        email: null,
        company: null,
        phone: null
      },
      hasErrors: false,
      formSaved: false,
      hasContactInfo: 1,
      errors: {
        name: [],
        email: [],
        company: [],
        phone: []
      }
    };
  },

  mounted() {
    if (this.existingContact) {
      this.form.name = this.existingContact.name;
      this.form.email = this.existingContact.email;
      this.form.company = this.existingContact.company;
      this.form.phone = this.existingContact.phone;
    }
  },

  methods: {
    resetErrors() {
      this.errors = {
        name: [],
        email: [],
        company: [],
        phone: []
      };

      this.hasErrors = false;
    },

    submitForm() {
      axios
        .post(this.action, this.form)
        .then(response => {
          // if (response.status === 200) {
          //     location.href = response.data.redirect;
          // }
          this.hasErrors = false;
          this.formSaved = true;
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.resetErrors();
            this.errors = Object.assign(
              this.errors,
              error.response.data.errors
            );
            this.hasErrors = true;
          }
        });
    }
  }
};
</script>
