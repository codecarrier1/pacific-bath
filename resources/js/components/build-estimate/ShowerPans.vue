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
            class="text-center absolute bg-blue-00849c absolute rounded-full text-white">
            <i class="fa-check"></i>
          </span>
        </div>
      </div>
    </div>

    <div class="p-16 flex">
      <div class="mr-10 w-2/5">
        <h4 class="text-gray-333 font-bold text-18 mb-4">Size</h4>
        <ul class="font-bold text-18 flex flex-wrap max-w-3xl">
          <li
            v-for="(size, index) in sizes"
            :key="index"
            :class="[{ disabled: size.disabled }, {'active-option' : size['size'] == selectedSize}]"
            class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 mr-4 pl-8 pr-8 py-4 relative bg-gray-fafafa border-box"
            style="break-inside:avoid;width:138px;"
            @click="selectSize(size.size)"
          >
            {{ size['size'] }}
            <i
              class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
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
            <i
              class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
              v-if="plumbing.position == selectedPlumbingPosition"
              style="right:10px;top:11px;line-height:44px;"></i></li>
        </ul>
      </div>
      <div class="ml-auto flex">
        <div class="px-10">
          <h4 class="text-gray-333 font-bold text-18 mb-4">Pan Color</h4>
          <ul class="flex">
            <li
              v-for="color in panColors"
              :key="color.id"
              class="cursor-pointer mr-10 relative text-center"
              @click="selectPanColor(color['id'])"
            >
              <span
                :class="getPanColorClasses(color)"
                class="block rounded-full color-holder"
                :style="{ 'background-image': 'url(' + color['url'] + ')' }"
              ></span>
              <i
                class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                v-if="color['id'] == selectedPanColor" style="right:-1px;"></i>
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
              ><i
                class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
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
  props: [ 'quote', 'initialData'],
  data: function() {
    return {
        panColors:[],
        drains:[],
        products: [],
        plumbingPositions: [],
        selectedDrain: null,
        selectedPanColor: null,
        selectedPlumbingPosition: null,
        selectedSize: null,
        selectedSubcategory: null,
        sizes: [],
        url: '/data/products-by-options/1',
      }
    },


    methods: {
      addShowerPanToQuote() {
        // if the following is true, its because of user error during product creation
        let showerPan = this.products[0];
        let products = [this.formatQuoteRequest(1, showerPan.id)];
        axios.put('/data/update-quote',
          { quote_id: this.quote.id, products: products, product_category_id: 1 });
      },

      calculateBackgroundImage(url) {
        return "background-image:url(" + url + ");";
      },

      filterProducts(ignoredArray) {


        // If we switch subcategories, we want to make all options available.
        if (ignoredArray === 'subCategories') {
          this.selectedSize = null;
          this.selectedPanColor = null;
          this.selectedPlumbingPosition = null;
        }

        let products = this.initialData.products;
        if (this.selectedSubcategory) {
          products = products.filter(product => product.product_sub_category_id === this.selectedSubcategory);
        }
        if (this.selectedSize) {
          products = products.filter(product => product.size === this.selectedSize);
        }
        if (this.selectedPanColor) {
          products = products.filter(product => product.pan_color_id == this.selectedPanColor);
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

      formatQuoteRequest(quantity, productId) {
        return { quantity: quantity, product_id: productId };
      },
      getDrainColorClasses(drain) {
        return {
          'active-option': drain.id === this.selectedDrain,
        }
      },
      getDrainFromQuote() {
        let drainArray = this.quote.items.filter(item => {
          return item.product_category_id === 9;
        });
        if (drainArray.length === 1) {
          return drainArray[0].product_id;
        }
        return null;
      },
      getPanColorClasses(panColor) {
        return {
          'active-option': panColor.id === this.selectedPanColor,
          'disabled': panColor.disabled === true,
        }
      },
      getPlumbingPositionClasses(position) {
        return {
          'active-option': position.position === this.selectedPlumbingPosition,
          'disabled': position.disabled === true,
        }
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

      maybeShowOption(option, value) {
        return this.products.findIndex(product => product[option] == value) !== -1;
      },

      selectDrain(id) {
        this.selectedDrain = this.setPropertyValue(id, this.selectedDrain);
        let products = [this.formatQuoteRequest(1, this.selectedDrain)];
        axios.put('/data/update-quote',
          { quote_id: this.quote.id, products: products, product_category_id: 9 });
        const drain = this.drains.find(drain => drain.id == this.selectedDrain)
        axios.post('/data/metallic-color/' + this.quote.lead_id, {color_id: drain.drain_color_id});
      },

      selectPanColor(id) {
        this.selectedPanColor = this.setPropertyValue(id, this.selectedPanColor);
        let ignored = 'panColors';
        if (this.selectedPanColor === null) {
          ignored = null;
        }
        this.filterProducts(ignored);
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
        this.filterProducts('subCategories');
      },


      setAttributesFromQuote() {
        let panArray = this.quote.items.filter(item => {
          return item.product_category_id === 1;
        });
        if (panArray.length) {
          let options = panArray[0].options;
          let plumbingPosition = options.find(item => item.key === 'plumbing_position');
          if (typeof plumbingPosition !== 'undefined') {
            this.selectedPlumbingPosition = plumbingPosition.value;
          }
          let panColor = options.find(item => item.key === 'pan_color_id');
          if (typeof panColor !== 'undefined') {
            this.selectedPanColor = parseInt(panColor.value);
          }
          let width = options.find(item => item.key === 'width');
          let depth = options.find(item => item.key === 'depth');
          if (typeof width !== 'undefined' && typeof depth !== 'undefined') {
            this.selectedSize = width.value + 'x' + depth.value;
          }
          this.selectedSubcategory = panArray[0].product_sub_category_id;
        }
      },
      setAvailableOptions(ignoredArray = null) {
        if (this.selectedSize === null || ignoredArray !== 'sizes') {
          const sizes = this.initialData.sizes;
          this.sizes = sizes.filter(size => this.products.findIndex(product => product.size === size.size) !== -1);
        }
        if (this.selectedPlumbingPosition === null ||  ignoredArray !== 'plumbingPositions') {
          const positions = this.initialData.plumbing_positions;
          this.plumbingPositions = positions.filter(position => {
            const index = this.products.findIndex(product => product.plumbing_position === position.position);
            return index !== -1
          });
        }
        if (this.selectedPanColor === null || ignoredArray !== 'panColors' ) {
          const panColors = this.initialData.pan_colors;
          this.panColors = panColors.filter(color => this.products.findIndex(product => product.pan_color_id == color.id) !== -1);
        }

      },

      async setInitialStatus(array) {
        array.forEach(item => {
          item.disabled = false;
        });
      },
      setPropertyValue(newValue, oldValue) {
        if (newValue === oldValue) {
          return null;
        }
        return newValue;
      },
      updateSelectedOptions() {
        if (this.panColors.findIndex(color => color.id === this.selectedPanColor) === -1) {
          this.selectedPanColor = null;
        }
        if (this.sizes.findIndex(size => size.size === this.selectedSize) === -1) {
          this.selectedSize = null;
        }
        if (this.plumbingPositions.findIndex(position => position.position === this.selectedPlumbingPosition) === -1) {
          this.selectedPlumbingPosition = null;
        }
      },
      validateData() {
        if (!this.selectedSubcategory) {
          alert("You must select a pan type");
          return false;
        } else if (!this.selectedSize) {
          alert("You must select a size");
          return false;
        } else if (!this.selectedPlumbingPosition) {
          alert("You must select a plumbing position");
          return false;
        } else if (!this.selectedPanColor) {
          alert("You must select a pan color");
          return false;
        } else if (!this.selectedDrain) {
          alert("You must select a drain color");
          return false;
        }
        return true;
      }

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
              this.sizes = this.initialData.sizes;
              this.sizes.sort();
              this.plumbingPositions = this.initialData.plumbing_positions;
              this.panColors = this.initialData.pan_colors;
              this.products = this.initialData.products;
              this.setInitialStatus(this.sizes);
              this.setInitialStatus(this.plumbingPositions);
              this.setInitialStatus(this.panColors);
              this.drains = this.initialData.drains;
          }

      },

      mounted() {
          this.$emit("loaded");
          const nextBtn = document.getElementById('next-link');
          nextBtn.onclick = () => {
              if (!this.validateData()) {
                  return false;
              }
              this.addShowerPanToQuote();
          };
          const prevBtn = document.getElementById('prev-link');
          prevBtn.onclick = () => {
              if (this.validateData()) {
                  this.addShowerPanToQuote();
              }
          };
          const saveBtn = document.getElementById('save-finish-later');
          saveBtn.onclick = () => {
              if (this.validateData()) {
                  this.addShowerPanToQuote();
              }
          }

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
