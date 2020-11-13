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
            <div class="mr-10 w-1/3">
                <h4 class="text-gray-333 font-bold text-18 mb-4">Size</h4>
                <ul class="font-bold text-18 flex flex-wrap max-w-3xl">
                    <li
                        v-for="(size, index) in sizes"
                        :key="index"
                        :class="[{ disabled: size.disabled }, {'active-option' : size['size'] === selectedSize}]"
                        class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 mr-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box"
                        style="break-inside:avoid;width:138px;"
                        @click="selectSize(size.size)"
                    >
                        {{ size['size'] }}
                        <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                           v-if="size['size'] == selectedSize" style="right:10px;top:11px;line-height:44px;"></i>
                    </li>
                </ul>
            </div>
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
                  class="block rounded-full color-holder" :style="{ 'background-image': 'url(' + color['url'] + ')' }"
              ></span>
                            <i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                               v-if="color['id'] == selectedTubColor" style="right:-1px;"></i>
                            {{ color.name }}
                        </li>
                    </ul>
                </div>
                <div class="pr-4">
                    <h4 class="text-gray-333 font-bold text-18 mb-4">Drain Color</h4>
                    <ul class="flex">
                        <li
                            v-for="(drain,index) in drains"
                            :key=" drain.id"
                            class="cursor-pointer mr-10 relative text-center"
                            @click="selectDrain(drain['id'])"
                        >
              <span
                  :class="getDrainColorClasses(drain)"
                  class="block rounded-full color-holder mx-auto relative"
                  :style="{ 'background-image': 'url(' + drain['drain_color_url'] + ')' }"
              ><i class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                  v-if="drain['id'] == selectedDrain " style="right:-1px;"></i></span>
                            {{ drain.drain_color_name }}
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
                drains: [],
                products: [],
                plumbingPositions: [],
                selectedDrain: null,
                selectedTubColor: null,
                selectedPlumbingPosition: null,
                selectedSize: null,
                selectedSubcategory: null,
                tubColors: [],
                sizes: [],
            }
        },


        methods: {
            addToQuote() {
                // if the following is true, its because of user error during product creation
                const tub = this.products[0];
                const products = [this.formatQuoteRequest(1, tub.id)];
                axios.put('/data/update-quote', {quote_id: this.quote.id, products: products, product_category_id: 7})
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
                    this.selectedSize = null;
                    this.selectedTubColor = null;
                    this.selectedPlumbingPosition = null;
                }
                let products = this.initialData.products;
                if (this.selectedSubcategory) {
                    products = products.filter(product => product.product_sub_category_id === this.selectedSubcategory);
                }
                if (this.selectedSize) {
                    products = products.filter(product => product.size === this.selectedSize);
                }
                if (this.selectedTubColor) {
                    products = products.filter(product => product.tub_color_id == this.selectedTubColor);
                }
                if (this.selectedPlumbingPosition) {
                    products = products.filter(product => product.plumbing_position === this.selectedPlumbingPosition);
                }
                this.products = products;
                this.$nextTick(() => {
                    this.setAvailableOptions(ignoredArray);
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

            selectDrain(id) {
                this.selectedDrain = this.setPropertyValue(id, this.selectedDrain);
                let products = [this.formatQuoteRequest(1, this.selectedDrain)];
                axios.put('/data/update-quote', {quote_id: this.quote.id, products: products, product_category_id: 10})
                    .then(response => console.log(response.data));
              const drain = this.drains.find(drain => drain.id == this.selectedDrain)
              axios.post('/data/metallic-color/' + this.quote.lead_id, {color_id: drain.drain_color_id});
            },

            selectPlumbingPosition(name) {
                this.selectedPlumbingPosition = this.setPropertyValue(name, this.selectedPlumbingPosition);
                this.filterProducts('plumbingPositions');
            },
            selectSize(size) {
                this.selectedSize = this.setPropertyValue(size, this.selectedSize);
                this.filterProducts('sizes');
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
                const tub = this.quote.items.find(item => item.product_category_id === 7);
                if (typeof tub !== 'undefined') {
                    const plumbingPosition = tub.options.find(item => item.key === 'plumbing_position');
                    if (typeof plumbingPosition !== 'undefined') {
                        this.selectedPlumbingPosition = plumbingPosition.value;
                    }
                    const tubColor = tub.options.find(item => item.key === 'tub_color_id');
                    if (typeof tubColor !== 'undefined') {
                        this.selectedTubColor = Number(tubColor.value);
                    }
                    const width = tub.options.find(item => item.key === 'width');
                    const depth = tub.options.find(item => item.key === 'depth');
                    if (typeof width !== 'undefined' && typeof depth !== 'undefined') {
                        this.selectedSize = width.value + 'x' + depth.value;
                    }
                    this.selectedSubcategory = tub.product_sub_category_id;
                }
            },
            setAvailableOptions(ignoredArray = null) {
                if (this.selectedSize === null || ignoredArray !== 'sizes') {
                    const sizes = this.formatSizes(this.initialData.sizes);
                    this.sizes = sizes.filter(size => this.products.findIndex(product => product.size === size.size) !== -1);
                }
                if (this.selectedPlumbingPosition === null || ignoredArray !== 'plumbingPositions') {
                    const positions = this.formatPlumbingPositions(this.initialData.plumbing_positions);
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
                if (this.tubColors.findIndex(color => color.id === this.selectedTubColor) === -1) {
                    this.selectedTubColor = null;
                }
                if (this.sizes.findIndex(size => size.size === this.selectedSize) === -1) {
                    this.selectedSize = null;
                }
                if (this.plumbingPositions.findIndex(position => position.position === this.selectedPlumbingPosition) === -1) {
                    this.selectedPlumbingPosition = null;
                }
            },

            validateData() {
                if(this.selectedSubcategory){
                  if(this.selectedSize){
                    if(this.selectedPlumbingPosition){
                      if(this.selectedTubColor){
                        if(this.selectedDrain){
                          this.addToQuote();
                          return true;
                        }
                      }
                    }
                  }
                }
                return false;
            },
            verifyDataOnClick(event) {
              console.log('verified it baby')
                event.preventDefault();
                const selectedTub = this.validateData()
                if(!selectedTub){
                   if(!confirm('You have not finished selecting a bathtub. Do you wish to continue?')){
                     return false;
                   }
                }
              window.location.href = event.target;

            },

        },

        computed: {
            boxWidth() {
                return 100 / this.initialData.subCategories.length + '%';
            },
        },

        created() {
            this.selectedDrain = this.getDrainFromQuote();
            this.setAttributesFromQuote();
            if (this.initialData) {
                const positions = Object.values(this.initialData.plumbing_positions);
                this.plumbingPositions = positions.map(position => {
                    return {position, disabled: false}
                });
                this.tubColors = this.initialData.tub_colors;
                this.products = this.initialData.products;
                this.drains = this.initialData.drains;
                this.sizes = this.formatSizes(this.initialData.sizes);
                this.subCategories = this.initialData.subCategories;
            }

        },

        mounted() {
            this.$emit("loaded");
            document.getElementById('next-link').onclick = this.verifyDataOnClick;
            document.getElementById('prev-link').onclick = this.verifyDataOnClick;
          //  document.getElementById('save-finish-later').onclick = this.verifyDataOnClick;
          document.getElementById("save-finish-later").addEventListener('click', this.verifyDataOnClick, false)



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
