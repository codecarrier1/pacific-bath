<template>
    <div class="px-16 py-12">
        <div class="flex">
            <div class="mr-16 flex-shrink-0" style="width:30rem;">
                <h2 class="text-24 font-bold mb-4">Fixtures &amp; Accessories</h2>
                <ul class="font-bold text-18">
                    <li
                        :class="[subCategory.id === selectedSubcategory ? 'active-option' : '']"
                        :key="subCategory.id"
                        @click="selectSubcategory(subCategory.id, subCategory.name)"
                        class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box"
                        v-for="subCategory in subCategories"
                    >
                        {{ subCategory.name }}
                        <span
                            class="qty text-white bg-blue-00849c rounded-full font-bold text-18 w-10 h-10 top-0 absolute flex justify-center items-center"
                            style="right:10px;top:11px;line-height:44px;"
                            v-if="getSelectedItemCount(items[subCategory.id]) > 0"
                        >{{ getSelectedItemCount(items[subCategory.id]) }}</span>
                    </li>
                </ul>
            </div>

            <div class="w-full">
                <h3 class="text-24 font-bold mb-4">{{ selectedSubcategoryName }}</h3>
                <template v-for="subCategory in subCategories">
                    <div v-if="subCategory.id === selectedSubcategory">
                        <div class="-mx-8">
                            <div class="overflow-auto flex">
                                <div
                                    v-for="(image,imageIndex) in subCategory.images"
                                    :key="imageIndex"
                                    :style="{width: boxWidth}"
                                    class="flex-shrink-0 pt-2" style="min-width: 33.3333%;"
                                >
                                    <div
                                        class="mx-8 mb-12 relative items-center justify-center box-shadow rounded-lg bg-white cursor-pointer border-3 pt-6 border-solid border-white border-box flex"
                                        style="height: 288px;"
                                    >
                                        <img :src="image" alt="" class="block mx-auto max-h-full mb-8" style="max-width:90%;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex relative flex-wrap mb-12 border-b-2 border-solid border-gray-e5e5e5 pb-12"
                            v-for="(item, itemIndex) in items[selectedSubcategory]"
                            :key="itemIndex"
                            :class="getErrorClasses(item)"
                        >
                            <div class="flex-shrink-0 w-flex1/3">
                                <h4 class="text-18 font-bold mb-6">{{ subCategory.name }} Options</h4>
                                <ul class="text-18 font-bold">
                                    <li
                                        :class="[option.description === items[selectedSubcategory][itemIndex].description ? 'active-option' : '']"
                                        :key="subCategory.id + '_' + option.id + '_' + option.id + '_' + optionIndex"
                                        @click="selectDescription(option.description, itemIndex)"
                                        class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box"
                                        v-for="(option, optionIndex) in options[subCategory.id]"
                                    >
                                        <span class="capitalize">{{ option.description }}</span>
                                        <i
                                            class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                                            style="right:10px;top:11px;line-height:44px;"
                                            v-if="option.description === items[selectedSubcategory][itemIndex].description"
                                        />
                                    </li>
                                </ul>
                            </div>
                            <div class="w-3/5 pl-12 border-box">
                                <h4 class="text-18 font-bold mb-6">Color</h4>
                                <ul class="flex flex-wrap">
                                    <li
                                        :key="subCategory.id + '_' + color.id + '_' + colorIndex"
                                        v-show="items[selectedSubcategory][itemIndex].availableColors.includes(color.id)"
                                        @click="selectColor(color.id, itemIndex)"
                                        class="cursor-pointer relative mr-16"
                                        v-for="(color, colorIndex) in colors[selectedSubcategory]"
                                    >
                    <span
                        :style="{ 'background-image': 'url(' + color.url + ')' }"
                        :class="[color.id === items[selectedSubcategory][itemIndex].color ? 'active-option' : '']"
                        class="block rounded-full color-holder mb-2 mx-auto"
                    />
                                        <i
                                            class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                                            style="right:-1px;"
                                            v-if="color.id === items[selectedSubcategory][itemIndex].color"
                                        />
                                        <strong
                                            class="text-center block mx-auto leading-tight"
                                            style="max-width:80px;"
                                        >{{ color.name }}</strong>
                                    </li>
                                </ul>
                            </div>
                            <span
                                @click="removeItem(index)"
                                style="width:36px;height:36px;"
                                class="text-gray-333 text-center absolute top-0 right-0 cursor-pointer border-2 border-solid border-gray-e5e5e5 rounded-full flex justify-center items-center"
                            >
                                <i class="fa fa-times" />
                            </span>
                        </div>
                    </div>
                </template>
                <span
                    @click="addItem"
                    v-show="showAddItem"
                    class="text-18 font-bold border-2 border-solid border-gray-e5e5e5 rounded-20 block cursor-pointer text-center p-8"
                >+ Add item</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            initialData: {
                type: Object,
                default: null
            },

            quote: {
                type: Object,
                default: null
            },

            options: {
                type: Object,
                default: null
            },
            service: {
              type: Object,
              default: null
            }
        },
        data: function () {
            return {
                availableColors: [],
                availableDescriptions: [],
                colors: [],
                items: {},
                preSelectedMetallicColorId: null,
                selectedSubcategory: null,
                selectedSubcategoryName: '',
                showAddItemOnMainUnit: true,
                subCategories: [],
                products: {},
            };
        },

        methods: {
            addItem() {
                const template = {
                    description: null,
                    color: null,
                    products: this.initialData.products.filter(
                        product =>
                            product.product_sub_category_id === this.selectedSubcategory
                    ),
                    availableColors: this.getAvailableColors(this.selectedSubcategory),
                    availableDescriptions: this.options[this.selectedSubcategory],
                    subCategory: this.selectedSubcategory,
                    index: this.items[this.selectedSubcategory].length, // The length will give us 1 more than the last index, which is also the next index, which is what we want here.
                    error: false
                };
                this.items[this.selectedSubcategory].push(template);
                if (this.selectedSubcategory === 8 && this.items[8].length === 1) {
                    this.showAddItemOnMainUnit = false;
                }
                if(this.selectedSubcategory !== 14 ){
                  const index = this.items[this.selectedSubcategory].length - 1;
                  this.selectColor(this.preSelectedMetallicColorId, index);
                }
                this.$forceUpdate();
            },

            addToQuote() {
                let products = [];
                this.subCategories.forEach(subCategory => {
                    this.items[subCategory.id].forEach(item => {
                        let product = item.products[0];

                        if (!products.length) {
                            // no products are already in the array, so simply add it.
                            products.push(this.formatQuoteRequest(1, product.id));
                        } else {
                            // Check to make sure that this product ID isn't already in the array
                            let existingIndex = products.findIndex(
                                existingProduct => existingProduct.id === product.id
                            );
                            if (existingIndex === -1) {
                                // The product was not already in the array, so it is added
                                products.push(this.formatQuoteRequest(1, product.id));
                            } else {
                                // the product was already in the array, so the quantity is incremented
                                products[existingIndex].quantity++;
                            }
                        }
                    });
                });
                axios
                    .put("/data/update-quote", {
                        quote_id: this.quote.id,
                        products: products,
                        product_category_id: 3
                    })
                    .then(response => console.log(response.data));
            },

            getAvailableColors(subCategoryId) {
                let colorIds = [];
                this.colors[subCategoryId].forEach(color => {
                    if (!colorIds.includes(color.id)) {
                        colorIds.push(color.id);
                    }
                });
                return colorIds;
            },

            getProducts(index) {
                let products = this.initialData.products;

                if (this.items[this.selectedSubcategory][index].description !== null) {
                    products = products.filter(
                        product => product.description.trim() === this.items[this.selectedSubcategory][index].description.trim()
                    );
                }

                // if color is selected, filter products by color
                if (this.items[this.selectedSubcategory][index].color !== null) {
                    products = products.filter(
                        product => product.fixture_color_id === this.items[this.selectedSubcategory][index].color
                    );
                }

                this.$set(this.items[this.selectedSubcategory][index].products, products);

            },

            getSelectedItemCount(items){
                const completedItems = items.filter(item => {
                    return item.color !== null && item.description !== null
                });
                return completedItems.length;
            },


            filterColorsByDescription(index) {
                let description = this.items[this.selectedSubcategory][index].description;
                let filteredColors = [];
                this.products[this.selectedSubcategory].forEach(product => {
                    if (product.description.trim() === description.trim()) {
                        if (!filteredColors.includes(product.fixture_color_id)) {
                            filteredColors.push(product.fixture_color_id);
                        }
                    }
                });
                this.$set(this.items[this.selectedSubcategory][index].availableColors, filteredColors)
            },

            filterSubcategoriesByService(){
                if(this.service.id !== 1){
                    const onlyAllowedForShowers = ["Shower Seat", "Shower Locker"];
                    this.subCategories = this.subCategories.filter(subCategory => !onlyAllowedForShowers.includes(subCategory.name));
                }

            },

            formatQuoteRequest(quantity, productId) {
                return { quantity: quantity, product_id: productId };
            },

            getColorClass(color, index) {
                return {
                    "active-option": color.id === this.items[this.selectedSubcategory][index]
                };
            },

            getErrorClasses(item) {
                return {
                    "border-2 border-solid border-white flex border-red-400":
                        item.error === true
                };
            },

            maybeRemoveError(index) {
                if (this.items[this.selectedSubcategory][index].error === true) {
                    if (this.items[this.selectedSubcategory][index].description !== null) {
                        if (this.items[this.selectedSubcategory][index].color !== null) {
                            this.items[this.selectedSubcategory][index].error = false;
                        }
                    }
                }
            },

            maybeResetColor(index) {
                if (this.items[this.selectedSubcategory][index].color !== null) {
                    if (
                        !this.availableColors[this.selectedSubcategory].includes(
                            this.items[this.selectedSubcategory][index].color
                        )
                    ) {
                        console.log(
                            "not null and not in available colors " +
                            this.items[this.selectedSubcategory][index].color
                        );
                        console.log(this.availableColors[this.selectedSubcategory]);
                        this.items[this.selectedSubcategory][index].color = null;
                    }
                }
            },

            removeItem(index) {
                this.items[this.selectedSubcategory].splice(index, 1);
                if (this.selectedSubcategory === 8 && this.items[8].length === 0) {
                    this.showAddItemOnMainUnit = true;
                }
                this.$forceUpdate();
            },

            selectColor(id, index) {
                this.items[this.selectedSubcategory][index].color = id;
                this.maybeRemoveError(index);
                this.$forceUpdate();
                this.getProducts(index);
                this.$forceUpdate();
            },

            selectDescription(value, index) {
                this.items[this.selectedSubcategory][index].description = value.trim();
                this.maybeResetColor(index);
                this.maybeRemoveError(index);
                this.getProducts(index);
                this.filterColorsByDescription(index);
                this.$forceUpdate();
            },

            selectSubcategory(id, name) {
                this.selectedSubcategory = id;
                this.selectedSubcategoryName = name;
            },

            selectItem(index) {
                this.selectedIndex = index;
            },

            setupInitialSubcategories() {
                this.subCategories = this.initialData.subCategories;
                this.filterSubcategoriesByService();
                this.subCategories.forEach(subCategory => {
                    this.items[subCategory.id] = [];
                    this.availableColors[subCategory.id] = this.getAvailableColors(subCategory.id);
                    this.products[subCategory.id] = this.initialData.products.filter(product => product.product_sub_category_id === subCategory.id);
                    this.products[subCategory.id].forEach(product =>
                        (product.fixture_color_id = parseInt(product.fixture_color_id))
                    );
                });
                this.selectedSubcategory = this.subCategories[0].id;
                this.selectedSubcategoryName = this.subCategories[0].name;
            },
            setupPreviousQuoteItems() {
                const quoteItems = this.quote.items.filter(item => item.product_category_id === 3);
                console.log(quoteItems)
                quoteItems.forEach(quoteItem => {
                    let options = quoteItem.options
                    let color = options.find(option => option.key === "fixture_color_id");
                    let description = options.find(option => option.key === "description");
                    this.selectedSubcategory = quoteItem.product_sub_category_id;
                    this.addItem();
                    let index = this.items[this.selectedSubcategory].length - 1;
                    this.items[this.selectedSubcategory][index].color = Number(color.value);
                    this.items[this.selectedSubcategory][index].description = description.value;
                });
                this.$forceUpdate();
            },

            validateData() {
                let items = [];
                let flag = true
                this.subCategories.forEach(subCategory => {
                    this.items[subCategory.id].forEach(quoteItem => {
                        items.push(quoteItem);
                        if(quoteItem.color === null || quoteItem.description === null){
                            alert("You must complete your selection.");
                            this.selectedSubcategory = quoteItem.subCategory;
                            this.items[quoteItem.subCategory][quoteItem.index].error = true;
                            this.$forceUpdate();
                            flag = false;
                        }
                    });
                });
                if(!items.length){
                    flag = confirm(
                        "You haven't selected anything from this category. Are you sure you want to continue?"
                    );
                }
               return flag;
            },

            verifyDataOnClick(event) {
                event.preventDefault();
                if (this.validateData()) {
                    this.addToQuote();
                    return window.location.href = event.target;
                }
                return false;
            }
        },

        computed: {
            boxWidth() {
                let index = this.subCategories.findIndex(subCat => subCat.id === this.selectedSubcategory);
                let width = this.subCategories[index].images.length || 3;
                return 100 / width + "%";
            },
            showAddItem() {
                // Always true for anything but Main Unit (ID is 8)
                if (this.selectedSubcategory !== 8) {
                    return true;
                }
                return this.showAddItemOnMainUnit;
            },
        },

        created() {
            if (this.initialData) {
                this.colors = this.initialData.colors;
            }
            this.setupInitialSubcategories();
            this.setupPreviousQuoteItems();
            this.selectedSubcategory = this.subCategories[0].id;
            this.selectedSubcategoryName = this.subCategories[0].name;
            axios.get('/data/metallic-color/' + this.quote.lead_id).then(response => {
              this.preSelectedMetallicColorId = parseInt(response.data);
              let empty = true
              this.subCategories.forEach(subCategory => {
                if(this.items[subCategory.id].length){
                  empty = false
                }
              })
              if(empty){
                this.addItem()
              }
            })
        },

        mounted() {
            this.$emit("loaded");
            document.getElementById("next-link").onclick = this.verifyDataOnClick;
            document.getElementById("prev-link").onclick = this.verifyDataOnClick;
            document.getElementById("save-finish-later").onclick = this.verifyDataOnClick;
        }
    };
</script>

<style>
    .active-option {
        border-color: #00849c;
        border-width: 3px;
        padding: 9px 38px 9px 19px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.11);
        font-weight: bold;
        background-color: #fff;
    }

    .active-option .qty {
        right: 0.9rem !important;
        top: 1rem !important;
    }

    .active-color {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.11);
        border: 3px solid #00849c;
    }
</style>
