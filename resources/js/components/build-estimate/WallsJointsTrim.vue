<template>
  <div>
    <div class="p-16 px-6 pb-12 flex">
      <div
        v-for="subCategory in subCategories"
        :key="subCategory.id"
        :style="{width: boxWidth}"
        class="mx-12 border-box"
        @click="selectSubcategory(subCategory.id)"
      >
        <div
          class="flex relative justify-center items-center box-shadow rounded-lg bg-white cursor-pointer border-3 border-solid border-white flex"
          style="height: 170px;"
          :class="[subCategory.id === selectedSubcategory ? 'border-blue-00849c' : '']"
        >
          <div class="w-1/2 text-center">
            <img class="inline-block max-w-full h-auto" :src="subCategory.image" alt />
          </div>
          <div class="w-1/2 text-center">
            <h3
              style="max-width:120px"
              class="inline-block align-middle text-gray-333 font-bold text-24"
            >
              {{ subCategory.name }}
            </h3>
            <span
              style="width:27px; height:27px; line-height:28px;"
              :class="{ 'bg-red-ce1400':  getSelectedItemCount(items[subCategory.id]) < 1, 'bg-blue-00849c': getSelectedItemCount(items[subCategory.id]) > 0}"
              class="align-middle inline-block font-bold rounded-full text-white text-18 ml-8"
            >
              <span v-if="getSelectedItemCount(items[subCategory.id]) > 0">{{ getSelectedItemCount(items[subCategory.id]) }}</span>
              <span v-else>!</span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <template v-for="subCategory in subCategories">
      <div
        class="px-16 pb-16"
        :key="subCategory.id"
        v-show="subCategory.id === selectedSubcategory"
      >
        <div
          class="flex relative mb-12"
          :class="[itemIndex > 0 ? 'border-t-2 border-solid border-gray-e5e5e5 pt-12' : '', getErrorClasses(item)]"
          v-for="(item, itemIndex) in items[selectedSubcategory]"
        >
          <div class="mr-12 flex-shrink-0 w-flex1/3">
            <h4 class="text-18 font-bold mb-6">{{ subCategory.name }} Options</h4>
            <ul class="text-18">
              <li
                :class="[option === items[selectedSubcategory][itemIndex].description ? 'active-option' : '']"
                v-for="(option, index) in options[subCategory.id]"
                :key="index"
                class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box"
                @click="selectDescription(option, itemIndex)"
              >
                <span class="capitalize">{{ option }}</span>
                <i
                  class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                  v-if="option === items[selectedSubcategory][itemIndex].description"
                  style="right:10px;top:11px;line-height:44px;"
                />
              </li>
            </ul>
          </div>
          <div>
            <h4 class="text-18 font-bold mb-6">Color</h4>
            <ul class="flex flex-wrap">
              <li
                v-for="(color, index) in colors[subCategory.id]"
                :key="color.id"
                v-show="items[selectedSubcategory][itemIndex].availableColors.includes(color.id)"
                class="cursor-pointer mr-16 relative text-center"
                @click="selectColor(color.id, itemIndex)"
              >
                <span
                  :class="[color.id === items[selectedSubcategory][itemIndex].color ? 'active-option' : '']"
                  class="block rounded-full color-holder"
                  :style="{ 'background-image': 'url(' + color.url + ')' }"
                />
                <i
                  class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                  v-if="color.id === items[selectedSubcategory][itemIndex].color"
                  style="right:-1px;"
                />
                <strong
                  style="max-width:80px;"
                  class="text-center block mx-auto leading-tight"
                >{{ color.name }}</strong>
              </li>
            </ul>
          </div>
          <span
            @click="removeItem(itemIndex)"
            style="width:36px;height:36px;"
            class="text-gray-333 text-center absolute top-0 right-0 cursor-pointer border-2 border-solid border-gray-e5e5e5 rounded-full flex justify-center items-center"
          >
            <i class="fa fa-times" />
          </span>
        </div>
        <span
          @click="addItem"
          class="mt-16 text-18 font-bold border-2 border-solid border-gray-e5e5e5 rounded-20 block cursor-pointer text-center p-8"
        >+ Add item</span>
      </div>
    </template>
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
    }
  },

  data: function() {
    return {
      availableColors: {},
      availableDescriptions: {},
      colors: [],
      descriptions: [],
      items: {},
      products: {},
      selectedSubcategory: null,
      subCategories: [],
      url: "/data/products-by-options/2"
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
      console.log(products);
      axios
        .put("/data/update-quote", {
          quote_id: this.quote.id,
          products: products,
          product_category_id: 2
        })
        .then(response => console.log(response.data));
    },

    enforceRules() {
      const pan = this.quote.items.find(item => item.product_sub_category_id === 1);
      if (typeof pan !== 'undefined') {
          const depth = pan.options.find(option => option.key === "depth");
          if (parseInt(depth.value) > 30) {
              // You cannot select a wall kit of a pan over 30" has been selected.
              //    this.subCategories = this.subCategories.filter(subCategory => { subCategory.id !== 4});
              this.subCategories = this.subCategories.filter(cat => cat.id !== 4);
          }
      }
    },

    formatQuoteRequest(quantity, productId) {
      return { quantity: quantity, product_id: productId };
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

    getColorClass(color, index) {
      return {
        "active-option":
          color.id === this.items[this.selectedSubcategory][index]
      };
    },

    getSelectedItemCount(items){
      const completedItems = items.filter(item => {
        return item.color !== null && item.description !== null
      });
      return completedItems.length;
    },
    getErrorClasses(item) {
      return {
        "border-2 border-solid border-white flex border-red-400":
          item.error === true
      };
    },

    /**
     * Performs a query and then places those items into the products array on the currently selected
     * array within this.items
     * selectedItem = this.items[this.selectedSubcategory][index]]
     * where index represents the current index of items to be added to the quote
     * selectedItem = {color: null, option: null, products: []}
     * @param index
     */
    getProducts(index) {
      // reset back to the original

      let products = this.initialData.products;

      if (this.items[this.selectedSubcategory][index].description !== null) {
        products = products.filter(
          product =>
            product.description.value.trim() ===
            this.items[this.selectedSubcategory][index].description.trim()
        );
      }

      // if color is selected, filter products by color
      if (this.items[this.selectedSubcategory][index].color !== null) {
        products = products.filter(
          product =>
            product.color_id ===
            this.items[this.selectedSubcategory][index].color
        );
      }

      this.items[this.selectedSubcategory][index].products = products;
      // now figure out a way to gray out products that are no longer available.

      // now, gray out the options and colors based upon availability
      this.$forceUpdate();
    },

    filterColorsByDescription(index) {
      let description = this.items[this.selectedSubcategory][index].description;
      let filteredColors = [];
      this.products[this.selectedSubcategory].forEach(product => {
        if (product.description.value.trim() === description.trim()) {
          if (!filteredColors.includes(product.color_id)) {
            filteredColors.push(product.color_id);
          }
        }
      });
      this.items[this.selectedSubcategory][
        index
      ].availableColors = filteredColors;
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
      this.$forceUpdate();
    },

    selectColor(id, index) {
      this.items[this.selectedSubcategory][index].color = id;
      this.maybeRemoveError(index);
      this.$forceUpdate();
      this.getProducts(index);
    },

    selectDescription(value, index) {
      this.items[this.selectedSubcategory][index].description = value.trim();
      this.maybeResetColor(index);
      this.maybeRemoveError(index);
      this.getProducts(index);
      this.filterColorsByDescription(index);
      this.$forceUpdate();
    },

    selectSubcategory(id) {
      this.selectedSubcategory = id;
    },

    setupInitialSubcategories() {
      this.subCategories = this.initialData.subCategories;
      this.enforceRules();
      this.subCategories.forEach(subCategory => {
        this.items[subCategory.id] = [];
        this.availableColors[subCategory.id] = this.getAvailableColors(
          subCategory.id
        );
        this.products[subCategory.id] = this.initialData.products.filter(
          product => product.product_sub_category_id === subCategory.id
        );
      });
      this.selectedSubcategory = this.subCategories[0].id;
    },
    setupPreviousQuoteItems() {
      let quoteItems = this.quote.items.filter(
        item => item.product_category_id === 2
      );
      quoteItems.forEach(quoteItem => {
        let options = quoteItem.options;
        let color = options.find(option => option.key === "color_id");
        let description = options.find(option => option.key === "description");
        this.selectedSubcategory = quoteItem.product_sub_category_id;
        this.addItem();
        let index = this.items[this.selectedSubcategory].length - 1;
        this.items[this.selectedSubcategory][index].color = parseInt(color.value);
        this.items[this.selectedSubcategory][index].description = description.value;
      });
    },

    validateData() {
      let items = [];
      let flag = true
      this.subCategories.forEach(subCategory => {
        this.items[subCategory.id].forEach(quoteItem => {
          items.push(quoteItem);
          if (quoteItem.color === null || quoteItem.description === null) {
            alert("You must complete your selection.");
            this.selectedSubcategory = quoteItem.subCategory;
            this.items[quoteItem.subCategory][quoteItem.index].error = true;
            this.$forceUpdate();
            flag = false;
          }
        });
      });
      if (!items.length) {
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
      let width = this.subCategories.length || 3;
      return 100 / width + "%";
    }
  },

  created() {
    if (this.initialData) {
      this.colors = this.initialData.colors;
    }
    this.setupInitialSubcategories();
    this.setupPreviousQuoteItems();
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
.active-color {
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.11);
  border: 3px solid #00849c;
}
.active-option {
  border-color: #00849c;
  border-width: 3px;
  padding: 9px 38px 9px 19px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.11);
  font-weight: bold;
  background-color: #fff;
}

</style>
