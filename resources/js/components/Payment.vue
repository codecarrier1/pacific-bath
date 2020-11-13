<template>
    <div>
        <div class="border-solid border-b border-gray-dcdcdc pb-12 mb-12">
            <h3 class="font-extrabold text-24 text-gray-333 text-center mb-4">Deposit Payment
                Type:</h3>

            <div style="max-width:60rem;"
                 class="flex justify-between font-bold text-18 text-gray-333 text-center mb-10 mx-auto">
                    <span v-for="(type, typeId) in depositTypes"
                          :key="typeId"
                          @click="selectType(typeId)"
                          :class="[selectedType === typeId ? 'active bg-blue-00849c border-blue-00849c text-white' : '']"
                          class="payment-option cursor-pointer w-1/2 bg-gray-fafafa border-gray-e5e5e5 border-solid border-2 py-4">{{ type }}</span>
            </div>
        </div>

        <div class="border-solid border-b border-gray-dcdcdc pb-12 mb-12" v-if="payment.final_type !== 'financing'">
            <h3 class="font-extrabold text-24 text-gray-333 text-center mb-4">Final Payment
                Type:</h3>
            <div style="max-width:60rem;"
                 class="flex justify-between font-bold text-18 text-gray-333 text-center mb-10 mx-auto">
                    <span v-for="(type, typeId) in depositTypes"
                          :key="typeId"
                          @click="selectFinalType(typeId)"
                          :class="[selectedFinalType === typeId ? 'active bg-blue-00849c border-blue-00849c text-white' : '']"
                          class="payment-option cursor-pointer w-1/2 bg-gray-fafafa border-gray-e5e5e5 border-solid border-2 py-4">{{ type }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default: null
            },
            action: {
                type: String,
                default: null
            },
            depositTypes: {
                type: Object,
                default: null
            },
            payment: {
                type: Object,
                default: null
            },
        },
        data: function () {
            return {
                selectedType: null,
                selectedFinalType: null,
                formSaved: false,
                form: {},
            }
        },
        methods: {
            selectType(type) {
                this.selectedType = type;
                this.form.type = type;
                this.submitForm();
            },

            selectFinalType(type) {
                this.selectedFinalType = type;
                this.form.final_type = type;
                this.submitForm();
            },

            submitForm() {
                axios.post(this.action, this.form).then(response => {
                    this.formSaved = true;
                    console.log(response)
                }).catch(error => {
                    console.log(error)
                });
            },
        },
        mounted() {
            if(this.payment.type !== undefined) {
                this.selectedType = this.payment.type;
            }

            if(this.payment.final_type !== undefined) {
                this.selectedFinalType = this.payment.final_type;
            }
        }
    }
</script>
<style scoped lang="scss">
    .payment-option {
        @apply rounded-none;
        &:first-child {
            @apply rounded-l-10;
        }

        &:last-child {
            @apply rounded-r-10;
        }
    }
</style>
