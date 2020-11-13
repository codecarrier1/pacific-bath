<template>
    <div class="px-16 pb-16">
        <div class="flex items-center mb-8">
            <h2 class="font-bold text-32 text-gray-333">Product Information</h2>
            <ul id="tabset" class="ml-auto font-bold flex text-center">
                <li v-for="(type, typeId) in productInfoTypes"
                    :key="typeId"
                    class="ml-4"
                    :class="[selectedType === typeId ? 'active-tab' : '']">
                    <a class="w-64 rounded-lg block text-white p-10 bg-gray-aaa py-8 hover:bg-blue-00849c cursor-pointer"
                       @click="selectType(typeId)">
                        {{ type }}
                    </a>
                </li>
            </ul>
        </div>

        <template v-for="(infos, typeId) in this.productInfos">
            <div :key="typeId"
                 v-show="selectedType === typeId"
                 class="box-shadow bg-white p-12 rounded-lg mb-8">
                <h2 class="font-bold text-32 text-gray-333 mb-8">Your New Kohler {{ serviceName }}</h2>
                <ul class="text-gray-333 text-24">
                    <li v-for="info in infos"
                        class="pl-16 pb-6 relative">
                        <span style="top:13px;left:5px;"
                              class="absolute rounded-full bg-gray-333 w-4 h-4"></span>
                        {{ info.content }}
                    </li>
                </ul>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            productInfos: {
                type: Object,
                default: null
            },
            productInfoTypes: {
                type: Object,
                default: null
            },
            serviceName: {
                type: String,
                default: null
            },
        },
        data: function () {
            return {
                selectedType: 'OVERVIEW',
            }
        },
        methods: {
            selectType(type) {
                this.selectedType = type;
            },
        }
    }
</script>
