<template>
  <div class="w-flex1/2 pl-4 border-box">
    <h2 class="text-32 font-bold text-gray-333 mb-10">Pacific Bath Agreement</h2>
    <div class="box-shadow rounded-lg bg-white text-18 px-12 pt-6 pb-12">
      <template>
        <div class="w-full max-w-4xl">
          <h3 class="text-18 text-gray-333 font-bold mb-4">
            Was the house built in 1977 or
            earlier?
          </h3>
          <div class="flex w-2/3 justify-between font-bold text-18 text-gray-333 text-center mb-12">
            <span
              class="cursor-pointer w-1/2 bg-gray-fafafa border-solid border-gray-e5e5e5 border-2 rounded-lg py-4"
              v-on:click="beforeSevenSeven = 1"
              v-bind:class="{ 'text-white bg-blue-00849c border-blue-00849c': beforeSevenSeven === 1 }"
            >Yes</span>
            <span
              class="cursor-pointer w-1/2 bg-gray-fafafa border-solid border-gray-e5e5e5 border-2 rounded-lg py-4"
              v-on:click="beforeSevenSeven = 0"
              v-bind:class="{ 'text-white bg-blue-00849c border-blue-00849c': beforeSevenSeven === 0 }"
            >No</span>
          </div>

          <div class="text-field">
            <label for="email">Client Email Address</label>
            <input type="email" id="client-email" name="email" v-model="form.email" />
          </div>

          <div class="text-field">
            <label for="client-legal-name">Client Full Legal Name</label>
            <input type="email" id="client-legal-name" name="text" v-model="form.clientLegalName" />
          </div>

          <div class="text-right pb-4">
            <span
              @click="toggleSecondSigner"
              class="cursor-pointer text-blue-00849c text-16"
            >
              <span v-if="!secondSigner">+ Add</span>
              <span v-else>- Remove</span> Second Signer
            </span>
          </div>

          <div class="text-field" v-if="secondSigner">
            <label for="second-signer-email">Second Signer Email Address</label>
            <input
              type="email"
              id="second-signer-email"
              name="email"
              v-model="form.secondSignerEmail"
            />
          </div>

          <div class="text-field" v-if="secondSigner">
            <label for="second-signer-name">Second Signer Full Legal Name</label>
            <input type="email" id="second-signer-name" name="text" v-model="form.secondSignerName" />
          </div>

          <p
            v-if="errors.email"
            class="text-16 mb-4 ml-6 text-red-500 error-msg"
          >{{ errors.email.join(', ') }}</p>

          <template
            v-for="(docs, type) in documents"
            v-if="type === 'BEFORE_SEVEN_SEVEN' && beforeSevenSeven === 1"
          >
            <div
              v-for="document in docs"
              :id="document.id"
              :key="document.id"
              class="flex w-full px-12 py-6"
            >
              <div class="mr-auto text-18 pr-4 flex items-center">
                <span v-if="isSigned(document)" class="text-blue-00849c fa-check-circle mr-10"></span>
                <span class="text-gray-333 font-bold">
                  <span class="fa-file-alt text-gray-666 mr-4"></span>
                  {{ document.title }}
                </span>
              </div>
              <div class="ml-auto">
                <span
                  style="line-height:20px;min-width:150px;"
                  @click="signDocument(document)"
                  :class="[isSigned(document) === true ? 'activeToggleState' : '']"
                  class="border-solid border-gray-e5e5e5 border-2 border-box text-gray-333 rounded-10 p-6 inline-block font-bold text-center"
                >
                  <span v-if="isSigned(document)" class="ml-2 fa-check mr-6"></span>
                  {{ getSignedText(document) }}
                </span>
              </div>
            </div>
          </template>
          <template
            v-for="(docs, type) in documents"
            v-if="type === 'AFTER_SEVEN_SEVEN' && beforeSevenSeven === 0"
          >
            <div
              v-for="document in docs"
              :id="document.id"
              :key="document.id"
              class="flex w-full px-12 py-6"
            >
              <div class="mr-auto text-18 pr-4 flex items-center">
                <span v-if="isSigned(document)" class="text-blue-00849c fa-check-circle mr-10"></span>
                <span class="text-gray-333 font-bold">
                  <span class="fa-file-alt text-gray-666 mr-4"></span>
                  {{ document.title }}
                </span>
              </div>
              <div class="ml-auto">
                <span
                  style="line-height:20px;min-width:150px;"
                  @click="signDocument(document)"
                  :class="[isSigned(document) === true ? 'activeToggleState' : 'cursor-pointer']"
                  class="border-solid border-gray-e5e5e5 border-2 border-box text-gray-333 rounded-10 p-6 inline-block font-bold text-center"
                >
                  <span v-if="isSigned(document)" class="ml-2 fa-check mr-6"></span>
                  {{ getSignedText(document) }}
                </span>
              </div>
            </div>
          </template>
        </div>
        <div class="w-full max-w-4xl mt-10">
          <h3 class="text-18 text-gray-333 font-bold mb-4">
            Do you have any signed documents for upload?
          </h3>
          <div class="flex w-2/3 justify-between font-bold text-18 text-gray-333 text-center mb-12">
            <span
              class="cursor-pointer w-1/2 bg-gray-fafafa border-solid border-gray-e5e5e5 border-2 rounded-lg py-4"
              v-on:click="hasDocumentsToUpload=1"
              v-bind:class="{ 'text-white bg-blue-00849c border-blue-00849c': hasDocumentsToUpload === 1 }"
            >Yes</span>
            <span
              class="cursor-pointer w-1/2 bg-gray-fafafa border-solid border-gray-e5e5e5 border-2 rounded-lg py-4"
              v-on:click="hasDocumentsToUpload=0"
              v-bind:class="{ 'text-white bg-blue-00849c border-blue-00849c': hasDocumentsToUpload === 0 }"
            >No</span>
          </div>

          <template
            v-if="hasDocumentsToUpload"
          >
            <input type="file" @change="chooseFileToUpload"
              style="display: none;"
              ref="btn_upload"
            />
            <div
              v-for="n in 3"
              :id="n"
              :key="n"
              class="w-full px-12 py-6"
            >
              <div v-if="!isDocument(uploadedDocuments[n-1])" class="w-full text-18 pr-4 flex items-center">

                  <div v-if="uploadedDocuments[n-1]" class="w-full text-18 flex items-center justify-between">
                    <span class="text-gray-333 font-bold">
                      <span class="fa-file-alt text-gray-666 mr-4"></span>
                      {{ uploadedDocuments[n-1].name }}
                    </span>
                    <span
                      style="cursor: pointer; user-select: none;"
                      class="cborder-solid border-gray-e5e5e5 border-2 border-box text-gray-333 rounded-10 p-6 inline-block font-bold text-center"
                      v-on:click="currentFileIndex=n-1, signUploadedDocument()"
                    >Sign</span>
                  </div>
                <div v-else class="ml-auto">
                  <span
                    style="cursor: pointer; user-select: none;"
                    class="cborder-solid border-gray-e5e5e5 border-2 border-box text-gray-333 rounded-10 p-6 inline-block font-bold text-center"
                    v-on:click="currentFileIndex=n-1, $refs.btn_upload.value=null, $refs.btn_upload.click()"
                  >Upload</span>
                </div>
              </div>
              <div v-else class="text-18 pr-4 flex items-center justify-between w-full">
                <span v-if="isSigned(uploadedDocuments[n-1])" class="ml-2 fa-check mr-6"></span>
                <span class="text-gray-333 font-bold">
                  <span class="fa-file-alt text-gray-666 mr-4"></span>
                  {{ uploadedDocuments[n-1].title + '.pdf' }}
                </span>
                <span
                  v-if="isSigned(uploadedDocuments[n-1])"
                  style="cursor: pointer; user-select: none;"
                  class="ml-auto cborder-solid border-gray-e5e5e5 border-2 border-box rounded-10 p-6 inline-block font-bold text-center bg-blue-00849c text-white"
                >{{ getSignedText(uploadedDocuments[n-1]) }}</span>
                <span
                  v-else
                  style="cursor: pointer; user-select: none;"
                  class="cborder-solid border-gray-e5e5e5 border-2 border-box text-gray-333 rounded-10 p-6 inline-block font-bold text-center"
                  v-on:click="currentFileIndex=n-1, signUploadedDocument()"
                >Sign</span>
              </div>
            </div>
            <p
                v-if="errors.signedDocument"
                class="text-16 mb-4 ml-6 text-red-500 error-msg"
              >{{ errors.signedDocument.join(', ') }}</p>
          </template>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import HelloSign from "hellosign-embedded";
import Vue from 'vue';

export default {
  props: {
    fetchSignerUrl: {
      type: String,
      default: null
    },
    documents: {
      type: Object,
      default: null
    },
    signedDocuments: {
      type: Array,
      default: null
    },
    baseStoreSignRoute: {
      type: String,
      default: null
    },
    helloSignClientId: {
      type: String,
      default: null
    },
    helloSignTestMode: {
      type: Boolean,
      default: null
    },
    defaultEmail: {
      type: String,
      default: null
    },
    confirmSignUrl: {
      type: String,
      default: null
    },
    cancelSignUrl: {
      type: String,
      default: null
    },
    lead: {
      type: Object,
      default: null
    },
    salesRep: {
      type: Object,
      default: null
    },
    documentsUploaded: {
      type: Array,
      default: () => []
    }
  },

  data() {
    return {
      hasErrors: false,
      beforeSevenSeven: 0,
      signer: {},
      secondSigner: false,
      form: {
        email: null,
        clientLegalName: null,
        secondSignerEmail: null,
        secondSignerName: null,
        is_signed: false
      },
      errors: {
        email: [],
        is_signed: []
      },
      helloSign: null,
      uploadedDocuments: [],
      hasDocumentsToUpload: 0,
      currentFileIndex: 0,
    };
  },

  methods: {
    chooseFileToUpload(e) {
      Vue.set(this.uploadedDocuments, this.currentFileIndex, e.target.files[0]);
    },

    signUploadedDocument() {

      const data = new FormData();
      data.append('signedDocument', this.uploadedDocuments[this.currentFileIndex]);
      data.append('fileName', this.uploadedDocuments[this.currentFileIndex].name.replace('.pdf', ''));

      axios.post(`/sales/${this.lead.id}/docs/upload`, data).then(response => {
        const document = response.data;
        this.uploadedDocuments[this.currentFileIndex] = document;

        axios
        .post(this.baseStoreSignRoute + document.id, { email: this.salesRep.email, is_signed: false, isUploaded: true })
        .then(response => {
          this.signer = response.data.signer;
          
          axios
            .get(this.fetchSignerUrl + this.signer.id)
            .then(response => {
              this.resetErrors();
              let decodedUrl = atob(response.data);

              this.sign(decodedUrl);
            })
            .catch(error => {
              if (error.response && error.response.status !== 200) {
                Vue.swal({
                  title: error.response.data.exception,
                  text: error.response.data.message,
                  icon: "error",
                  showCancelButton: false,
                  confirmButtonText: "Okay",
                  reverseButtons: true
                });
                return;
              }

              Vue.swal({
                title: "Something went wrong",
                text: error,
                icon: "error",
                showCancelButton: false,
                confirmButtonText: "Okay",
                reverseButtons: true
              });
            });

        })
        .catch(error => {
          console.log('error', error);
          if (error.response.status === 422) {
            this.resetErrors();
            this.errors = Object.assign(
              this.errors,
              error.response.data.errors
            );
            this.hasErrors = true;
          }
        });

      }).catch(err => {
        console.log('err', err.response);
        if (err.response.status === 422) {
          this.resetErrors();
          this.errors = Object.assign(
            this.errors,
            err.response.data.errors
          );
          this.hasErrors = true;
          Vue.set(this.uploadedDocuments, this.currentFileIndex, null);
        }
      });

    },

    signDocument(document) {
      // Clear previous errors
      this.resetErrors();

      // Store our signer request
      axios
        .post(this.baseStoreSignRoute + document.id, this.form)
        .then(response => {
          // Grab our signer
          this.signer = response.data.signer;

          // Fetch our signer URL
          axios
            .get(this.fetchSignerUrl + this.signer.id)
            .then(response => {
              let decodedUrl = atob(response.data);

              this.sign(decodedUrl);
            })
            .catch(error => {
              if (error.response && error.response.status !== 200) {
                Vue.swal({
                  title: error.response.data.exception,
                  text: error.response.data.message,
                  icon: "error",
                  showCancelButton: false,
                  confirmButtonText: "Okay",
                  reverseButtons: true
                });

                return;
              }

              Vue.swal({
                title: "Something went wrong",
                text: error,
                icon: "error",
                showCancelButton: false,
                confirmButtonText: "Okay",
                reverseButtons: true
              });
            });
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
    },

    isDocument(document) {

      let existingIndex = this.signedDocuments.findIndex(
        doc => document && doc.sales_document_id === document.id
      );

      return existingIndex !== -1;
    },

    isSigned(document) {
      if (typeof document !== "object") {
        return false;
      }

      let existingIndex = this.signedDocuments.findIndex(
        doc => document && doc.sales_document_id === document.id
      );

      if (existingIndex >= 0) {
        return this.signedDocuments[existingIndex].is_signed;
      }
      return false;
    },

    getSignedText(document) {
      if (this.isSigned(document)) {
        return "Signed";
      }

      return "Unsigned";
    },

    resetErrors() {
      this.hasErrors = false;

      this.errors = {
        email: [],
        is_signed: []
      };
    },

    sign(url) {
      this.helloSign.open(url);
    },

    completedSign() {
      // Call our backend and verify signed
      axios.post(this.confirmSignUrl + this.signer.id).then(response => {
        // Push our document to signed
        this.signer.is_signed = true;
        this.signedDocuments.push(this.signer);
        this.uploadedDocuments.splice(this.currentFileIndex, 1, response.data);
        // Reset our signer
        this.signer = null;
      });
    },

    cancelSign() {
      console.log(this.cancelSignUrl + this.signer.id);
      axios.get(this.cancelSignUrl + this.signer.id)
      .then(response => {
        this.signer = null;
        Vue.set(this.uploadedDocuments, this.currentFileIndex, null);
      })
      .catch(err => {
        console.log('err', err.response);
      });
    },

    toggleSecondSigner(){
        if (this.secondSigner){
            this.form.secondSignerEmail = null;
            this.form.secondSignerName = null;
        }
        this.secondSigner = !this.secondSigner;
    },

    validateData() {
      if (this.hasDocumentsToUpload) {
        if (this.uploadedDocuments.length < 3) {
          alert('Upload & Sign all documents to proceed.');
          return false;
        } else {
          const unSigned = this.uploadedDocuments.map(doc => {
            if (!this.isSigned(doc)) {
              return doc;
            }
          });
          if (unSigned.length) {
            alert('Sign all uploaded documents to proceed.');
            return false;
          }
        }
      }
      return true;
    },

    verifyDataOnClick(event) {
      event.preventDefault();
      if (this.validateData()) {
        window.location.href = event.target;
      }
    }
  },

  mounted() {
    // Set out default lead email
    if (this.defaultEmail) {
      this.form.email = this.defaultEmail;
    }

    this.uploadedDocuments = this.documentsUploaded.slice(0, 3);
    
    let signConfig = {
      clientId: this.helloSignClientId,
      allowCancel: true,
      messageListener: function(eventData) {
        if (eventData.event == HelloSign.EVENT_SIGNED) {
          this.completedSign();
        }
      }
    };

    // While testing turn on various test features
    if (this.helloSignTestMode === true) {
      signConfig.skipDomainVerification = true;
      signConfig.testMode = this.helloSignTestMode;
      signConfig.debug = false;
    }

    // Setup HelloSign
    this.helloSign = new HelloSign(signConfig);

    this.helloSign.on('finish', data => {
      this.completedSign();
    });

    this.helloSign.on('cancel', () => {
      this.cancelSign();
    });
    
    this.helloSign.on('error', (data) => {
      Vue.set(this.uploadedDocuments, this.currentFileIndex, null);
      this.helloSign.close();
    });

    document.getElementById("next-link").onclick = this.verifyDataOnClick;
    document.getElementById("prev-link").onclick = this.verifyDataOnClick;
    document.getElementById("save-finish-later").onclick = this.verifyDataOnClick;
  }
};
</script>
