<template>
    <div>
        <div class="p-16 px-6 flex bg-gray-fafafa">
            <div
                v-for="subcategory in initialData.subCategories"
                :key="subcategory['id']"
                :style="{width: boxWidth}"
                class="mx-12 border-box"
                @click="selectSubcategory(subcategory['id'])"
            >
                <div
                    class="flex relative items-center justify-center box-shadow rounded-lg bg-white cursor-pointer border-3 border-solid border-white"
                    style="height: 363px;"
                    :class="[subcategory['id'] === selectedSubcategory ? 'border-blue-00849c' : '']"
                >
                    <img class="block max-w-full h-auto" :src="subcategory['image']" alt="">
                    <h3 style="bottom:25px;" class="absolute text-center text-gray-333 font-bold text-24">{{
                        subcategory['name'] }}</h3>
                    <span
                        v-if="subcategory['id'] == selectedSubcategory"
                        style="width:34px; height:34px; right:20px; top:20px; line-height:36px;"
                        class="text-center absolute bg-blue-00849c absolute rounded-full text-white flex justify-center items-center">
            <i class="fa-check" ></i>
          </span>
                </div>
            </div>
        </div>

        <div class="p-16 flex">
            <div>
                <h4 class="text-gray-333 font-bold text-18 mb-4">Plumbing</h4>
                <ul class="font-bold text-18">
                    <li
                        v-for="plumbing in plumbingPositions"
                        :key="plumbing.position"
                        :class="getPlumbingPositionClasses(plumbing)"
                        class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box"
                        style="width:138px;"
                        @click="selectPlumbingPosition(plumbing['position'])"
                    >
                        <span class="capitalize">{{ plumbing.position }}</span>
                        <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                           v-if="plumbing.position == selectedPlumbingPosition"
                           style="right:10px;top:11px;line-height:44px;"></i></li>
                </ul>
            </div>
            <div class="ml-auto flex">
                <div class="px-10">
                    <h4 class="text-gray-333 font-bold text-18 mb-4">Tub Color</h4>
                    <ul class="flex">
                        <li
                            v-for="color in tubColors"
                            :key="color.id"
                            class="cursor-pointer mr-10 relative text-center"
                            @click="selectTubColor(color['id'])"
                        >
              <span
                  :class="getTubColorClasses(color)"
                  class="relative inline-block rounded-full color-holder" :style="{ 'background-image': 'url(' + color['url'] + ')' }"
              >
                <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                               v-if="color['id'] == selectedTubColor" style="right:-1px;"></i>
              </span>
                            <div>{{ color.name }}</div>
                        </li>
                    </ul>
                </div>
                <div class="px-10">
                    <h4 class="text-gray-333 font-bold text-18 mb-4">Fixture Color</h4>
                    <ul class="flex">
                        <li
                            v-for="color in fixtureColors"
                            :key="color.id"
                            class="cursor-pointer mr-10 relative text-center"
                            @click="selectFixtureColor(color['id'])"
                        >
              <span
                  :class="getFixtureColorClasses(color)"
                  class="relative inline-block rounded-full color-holder" :style="{ 'background-image': 'url(' + color['url'] + ')' }"
              >
                <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                               v-if="color['id'] == selectedFixtureColor" style="right:-1px;"></i>
              </span>
                            <div>{{ color.name }}</div>
                        </li>
                    </ul>
                </div>
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

        },
        data: function () {
            return {
                fixtureColors: [],
                products: [],
                plumbingPositions: [],
                selectedTubColor: null,
                selectedFixtureColor: null,
                selectedPlumbingPosition: null,
                selectedSubcategory: null,
                tubColors: [],
            }
        },


        methods: {
            addToQuote() {
                // if the following is true, its because of user error during product creation
                let tub = this.products[0];
                let products = [this.formatQuoteRequest(1, tub.id)];
                axios.put('/data/update-quote', {quote_id: this.quote.id, products: products, product_category_id: 6})
                    .then(response => console.log(response.data));
            },

            calculateBackgroundImage(url) {
                return "background-image:url(" + url + ");";
            },

            formatQuoteRequest(quantity, productId) {
                return {quantity: quantity, product_id: productId};
            },

            getDrainColorClasses(drain) {
                return {
                    'active-option': drain.id === this.selectedDrain,
                }
            },

            getDrainFromQuote() {
                const tubDrain = this.quote.items.find(item => item.product_category_id === 10);
                if (typeof tubDrain === 'undefined') {
                    return null;
                }
                return tubDrain.product_id;

            },

            getFixtureColorClasses(fixtureColor) {
                return {
                    'active-option': fixtureColor.id === this.selectedFixtureColor,
                    'disabled': fixtureColor.disabled === true,
                }
            },

            getTubColorClasses(tubColor) {
                return {
                    'active-option': tubColor.id === this.selectedTubColor,
                    'disabled': tubColor.disabled === true,
                }
            },

            getPlumbingPositionClasses(position) {
                return {
                    'active-option': position.position === this.selectedPlumbingPosition,
                    'disabled': position.disabled === true,
                }
            },

            filterProducts(ignoredArray) {

                if (ignoredArray === 'subCategories') {
                    this.selectedFixtureColor = null;
                    this.selectedTubColor = null;
                    this.selectedPlumbingPosition = null;
                }
                let products = this.initialData.products;
                if (this.selectedSubcategory) {
                    products = products.filter(product => product.product_sub_category_id === this.selectedSubcategory);
                }
                if (this.selectedFixtureColor) {
                    products = products.filter(product => product.fixture_color_id == this.selectedFixtureColor);
                }
                if (this.selectedTubColor) {
                    products = products.filter(product => product.tub_color_id == this.selectedTubColor);
                }
                if (this.selectedPlumbingPosition) {
                    products = products.filter(product => product.plumbing_position === this.selectedPlumbingPosition);
                }
                this.products = products;
                this.$nextTick(() => {
                  //  this.setAvailableOptions(ignoredArray);
                    this.updateSelectedOptions();
                    this.$forceUpdate();
                });


            },


            formatPlumbingPositions(arrayOfPositions) {
                return arrayOfPositions.map(position => {
                    return {position, disabled: false}
                });
            },

            formatSizes(arrayOfSizes) {
                return arrayOfSizes.map(size => {
                    return {size, disabled: false}
                });
            },

            isActiveSize(item) {
                if (item.disabled === true) {
                    return false;
                }
                return item.size === this.selectedSize;
            },
            isDisabled(item) {
                return item.disabled === true;
            },

            selectFixtureColor(id) {
                this.selectedFixtureColor = this.setPropertyValue(id, this.selectedFixtureColor);
                axios.post('/data/metallic-color/' + this.quote.lead_id, {color_id: id});
                this.filterProducts('fixtureColors');
            },

            selectPlumbingPosition(name) {
                this.selectedPlumbingPosition = this.setPropertyValue(name, this.selectedPlumbingPosition);
                this.filterProducts('plumbingPositions');
            },

            selectSubcategory(id) {
                this.selectedSubcategory = this.setPropertyValue(id, this.selectedSubcategory);
                this.products = this.initialData.products.filter(product => product.product_sub_category_id === this.selectedSubcategory);

            },
            selectTubColor(id) {
                this.selectedTubColor = this.setPropertyValue(id, this.selectedTubColor);
                this.filterProducts('tubColors');
            },

            setAttributesFromQuote() {
                const tub = this.quote.items.find(item => item.product_category_id === 6);
                if (typeof tub !== 'undefined') {
                    const plumbingPosition = tub.options.find(item => item.key === 'plumbing_position');
                    if (typeof plumbingPosition !== 'undefined') {
                        this.selectedPlumbingPosition = plumbingPosition.value;
                    }
                    const tubColor = tub.options.find(item => item.key === 'tub_color_id');
                    if (typeof tubColor !== 'undefined') {
                      this.selectedTubColor = Number(JSON.parse(tubColor.color).id)
                    }
                    const fixtureColor = tub.options.find(item => item.key === 'fixture_color_id');
                    if (typeof fixtureColor !== 'undefined') {
                        this.selectedFixtureColor = Number(JSON.parse(fixtureColor.color).id);
                    }

                    this.selectedSubcategory = tub.product_sub_category_id;
                }
            },
            setAvailableOptions(ignoredArray = null) {
                if (this.selectedFixtureColor === null || ignoredArray !== 'fixtureColors') {
                    const fixtureColors = this.initialData.fixture_colors;
                    this.fixtureColors = fixtureColors.filter(color => this.products.findIndex(product => product.fixture_color_id == color.id) !== -1);
                }
                if (this.selectedPlumbingPosition === null || ignoredArray !== 'plumbingPositions') {
                    const positions = this.formatPlumbingPositions(Object.values(this.initialData.plumbing_positions));
                    this.plumbingPositions = positions.filter(position => this.products.findIndex(product => product.plumbing_position === position.position) !== -1);
                }
                if (this.selectedTubColor === null || ignoredArray !== 'tubColors') {
                    const tubColors = this.initialData.tub_colors;
                    this.tubColors = tubColors.filter(color => this.products.findIndex(product => product.tub_color_id == color.id) !== -1);
                }
            },

            setPropertyValue(newValue, oldValue) {
                if (newValue === oldValue) {
                    return null;
                }
                return newValue;
            },

            updateSelectedOptions(ignoredArray = null) {
                if (this.tubColors.findIndex(color => color.id == this.selectedTubColor) === -1) {
                    this.selectedTubColor = null;
                }
                if (this.fixtureColors.findIndex(color => color.id == this.selectedFixtureColor) === -1) {
                    this.selectedFixtureColor = null;
                }
                if (this.plumbingPositions.findIndex(position => position.position === this.selectedPlumbingPosition) === -1) {
                    this.selectedPlumbingPosition = null;
                }
            },

            validateData() {
                if (!this.selectedSubcategory) {
                    alert("You must select a tub type");
                    return false;
                } else if (!this.selectedPlumbingPosition) {
                    alert("You must select a plumbing position");
                    return false;
                } else if (!this.selectedTubColor) {
                    alert("You must select a tub color");
                    return false;
                } else if (!this.selectedFixtureColor){
                  alert("You must select a fixture color")
                  return false
                }
                return true;
            },
            verifyDataOnClick(event) {
                event.preventDefault();
                if (this.validateData()) {
                    this.addToQuote();
                    window.location.href = event.target;
                }
            },


        },

        computed: {
            boxWidth() {
                return 100 / this.initialData.subCategories.length + '%';
            },
        },

        created() {
            this.setAttributesFromQuote();
            if (this.initialData) {
                this.plumbingPositions = this.formatPlumbingPositions(Object.values(this.initialData.plumbing_positions));
                this.tubColors = this.initialData.tub_colors;
                this.fixtureColors = this.initialData.fixture_colors;
                this.products = this.initialData.products;
                this.subCategories = this.initialData.subCategories;
            }

        },

        mounted() {
            this.$emit("loaded");
            document.getElementById('next-link').onclick = this.verifyDataOnClick;
            document.getElementById('prev-link').onclick = this.verifyDataOnClick;
            document.getElementById('save-finish-later').onclick = this.verifyDataOnClick;

        },
    }
</script>

<style>
    .active-option {
        border-color: #00849c;
        border-width: 3px;
        padding: 9px 19px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .11)
    }

    .active-color {
        box-shadow: 0 3px 6px rgba(0, 0, 0, .11);
        border: 3px solid #00849c;
    }

    .disabled {
        background-color: gray;
        opacity: 0.25;
        pointer-events: none;
    }

</style>
