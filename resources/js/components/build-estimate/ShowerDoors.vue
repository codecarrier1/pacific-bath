<template>
  <div class="px-16 py-12">
    <div class="flex">
      <div class="mr-16 flex-shrink-0" style="width:30rem;">
        <h2 class="text-24 font-bold mb-4">Shower Doors</h2>
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
              class="flex relative mb-12 border-b-2 border-solid border-gray-e5e5e5 pb-12"
              v-for="(item, itemIndex) in items[selectedSubcategory]"
              :key="itemIndex"
              :class="getErrorClasses(item)"
            >
              <div class="flex-shrink-0">
                <h4 class="text-18 font-bold mb-6">{{ subCategory.name }} Options</h4>
                <ul class="text-18 font-bold">
                  <li
                    :class="[description === items[selectedSubcategory][itemIndex].description ? 'active-option' : '']"
                    :key="descriptionIndex"
                    @click="selectDescription(description, itemIndex)"
                    class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box whitespace-no-wrap"
                    v-for="(description, descriptionIndex) in descriptions[subCategory.id]"
                  >
                    <span class="capitalize">{{ description }}</span>
                    <i
                      class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                      style="right:10px;top:11px;line-height:44px;"
                      v-if="description === items[selectedSubcategory][itemIndex].description"
                    />
                  </li>
                </ul>
              </div>
              <div class="flex px-12 w-full border-box flex-wrap">
                <div class="w-full border-box pb-8">
                    <h4 class="text-18 font-bold mb-6">Glass Color</h4>
                    <ul class="flex flex-wrap">
                    <li
                        :key="subCategory.id + '_' + color.id + '_' + colorIndex"
                        v-show="items[selectedSubcategory][itemIndex].glassColors.includes(color.id)"
                        @click="selectGlassColor(color.id, itemIndex)"
                        class="cursor-pointer relative px-4 mb-4"
                        v-for="(color, colorIndex) in glassColors[selectedSubcategory]"
                    >
                        <span
                        :style="{ 'background-image': 'url(' + color.url + ')' }"
                        :class="[color.id === items[selectedSubcategory][itemIndex].glass_color_id ? 'active-option' : '']"
                        class="block rounded-full color-holder mb-2 mx-auto relative"
                        >
                        <i
                        class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                        style="right:-1px;"
                        v-if="color.id === items[selectedSubcategory][itemIndex].glass_color_id"
                        />
                        </span>
                        <strong
                        class="text-center block mx-auto leading-tight"
                        style="max-width:80px;"
                        >{{ color.name }}</strong>
                    </li>
                    </ul>
                </div>
                <div class="w-full border-box">
                    <h4 class="text-18 font-bold mb-6">Trim Color</h4>
                    <ul class="flex flex-wrap">
                    <li
                        :key="subCategory.id + '_' + color.id + '_' + colorIndex"
                        v-show="items[selectedSubcategory][itemIndex].trimColors.includes(color.id)"
                        @click="selectTrimColor(color.id, itemIndex)"
                        class="cursor-pointer relative px-4 mb-4"
                        v-for="(color, colorIndex) in trimColors[selectedSubcategory]"
                    >
                        <span
                        :style="{ 'background-image': 'url(' + color.url + ')' }"
                        :class="[color.id === items[selectedSubcategory][itemIndex].trim_color_id ? 'active-option' : '']"
                        class="block rounded-full color-holder mb-2 mx-auto relative"
                        >
                        <i
                        class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                        style="right:-1px;"
                        v-if="color.id === items[selectedSubcategory][itemIndex].trim_color_id"
                        />
                        </span>
                        <strong
                        class="text-center block mx-auto leading-tight"
                        style="max-width:80px;"
                        >{{ color.name }}</strong>
                    </li>
                    </ul>
                </div>
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
    service: {
      type: Object,
      default: null
    }
  },
  data: function() {
    return {
      descriptions: {},
      glassColors: {},
      items: {},
      products: {},
      selectedSubcategory: null,
      selectedSubcategoryName: "",
      preSelectedMetallicColorId: null,
      showAddItem: true,
      subCategories: [],
      trimColors: {}
    };
  },

  methods: {
    addItem() {
      const template = {
        description: null,
        glass_color_id: null,
        trim_color_id: null,
        products: this.initialData.products.filter(
          product =>
            product.product_sub_category_id === this.selectedSubcategory
        ),
        glassColors: this.getAvailableGlassColors(this.selectedSubcategory),
        trimColors: this.getAvailableTrimColors(this.selectedSubcategory),
        availableDescriptions: this.descriptions[this.selectedSubcategory],
        subCategory: this.selectedSubcategory,
        index: this.items[this.selectedSubcategory].length, // The length will give us 1 more than the last index, which is also the next index, which is what we want here.
        error: false
      };
      this.items[this.selectedSubcategory].push(template);
      this.showAddItem = false;
      const index = this.items[this.selectedSubcategory].length - 1;
      this.selectTrimColor(this.preSelectedMetallicColorId, index);
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
          product_category_id: 4
        })
        .then(response => console.log(response.data));
    },

    getAvailableGlassColors(subCategoryId) {
      let colorIds = [];
      this.glassColors[subCategoryId].forEach(color => {
        if (!colorIds.includes(color.id)) {
          colorIds.push(Number(color.id));
        }
      });
      return colorIds;
    },

    getAvailableTrimColors(subCategoryId) {
      let colorIds = [];
      this.trimColors[subCategoryId].forEach(color => {
        if (!colorIds.includes(color.id)) {
          colorIds.push(Number(color.id));
        }
      });
      return colorIds;
    },

    getProducts(index) {
      // Only products for this subcategory
      let products = this.initialData.products.filter(
        product => product.product_sub_category_id === this.selectedSubcategory
      );
      const selectedDescription = this.items[this.selectedSubcategory][index]
        .description;

      if (selectedDescription !== null) {
        products = products.filter(
          product => product.description.trim() === selectedDescription.trim()
        );
      }

      const selectedGlassColor = this.items[this.selectedSubcategory][index]
        .glass_color_id;
      if (selectedGlassColor !== null) {
        products = products.filter(
          product => product.glass_color_id == selectedGlassColor
        );
      }
      // if color is selected, filter products by color
      if (this.items[this.selectedSubcategory][index].trim_color_id !== null) {
        products = products.filter(
          product =>
            product.trim_color_id ==
            this.items[this.selectedSubcategory][index].trim_color_id
        );
      }

      this.items[this.selectedSubcategory][index].products = products;
    },

    filterDescriptionByGlassColor(index) {
      let glassColor = this.items[this.selectedSubcategory][index]
        .glass_color_id;
      let filteredDescriptions = [];
      this.products[this.selectedSubcategory].forEach(product => {
        if (product.glass_color_id == glassColor) {
          if (!filteredDescriptions.includes(product.description)) {
            filteredDescriptions.push(product.description);
          }
        }
      });
      this.$set(
        this.items[this.selectedSubcategory][index].trimColors,
        filteredColors
      );
    },

    filterGlassColorsByDescription(index) {
      let description = this.items[this.selectedSubcategory][index].description;
      let filteredColors = [];
      this.products[this.selectedSubcategory].forEach(product => {
        if (product.description.trim() === description.trim()) {
          if (!filteredColors.includes(product.glass_color_id)) {
            filteredColors.push(product.glass_color_id);
          }
        }
      });
      this.items[this.selectedSubcategory][index].glassColors = filteredColors;
      this.$forceUpdate();
    },
    filterTrimColorsByDescription(index) {
      let description = this.items[this.selectedSubcategory][index].description;
      let filteredColors = [];
      this.products[this.selectedSubcategory].forEach(product => {
        if (product.description.trim() === description.trim()) {
          if (!filteredColors.includes(product.trim_color_id)) {
            filteredColors.push(product.trim_color_id);
          }
        }
      });
      this.$set(
        this.items[this.selectedSubcategory][index].trimColors,
        filteredColors
      );
    },
    filterTrimColorsByGlassColor(index) {
      let glassColor = this.items[this.selectedSubcategory][index]
        .glass_color_id;
      let filteredTrimColors = [];
      this.products[this.selectedSubcategory].forEach(product => {
        if (product.glass_color_id == glassColor) {
          if (!filteredTrimColors.includes(product.trim_color_id)) {
            filteredTrimColors.push(product.trim_color_id);
          }
        }
      });
      this.$set(
        this.items[this.selectedSubcategory][index].trimColors,
        filteredTrimColors
      );
    },

    formatQuoteRequest(quantity, productId) {
      return { quantity: quantity, product_id: productId };
    },

    getColorClass(color, index) {
      return {
        "active-option":
          color.id === this.items[this.selectedSubcategory][index].color
      };
    },

    getErrorClasses(item) {
      return {
        "border-2 border-solid border-white flex border-red-400":
          item.error === true
      };
    },

    getSelectedItemCount(items){
      const completedItems = items.filter(item => {
        return item.color !== null && item.description !== null
      });
      return completedItems.length;
    },

    maybeRemoveError(index) {
      if (this.items[this.selectedSubcategory][index].error === true) {
        if (this.items[this.selectedSubcategory][index].description !== null) {
          if (this.items[this.selectedSubcategory][index].glassColor !== null) {
            this.items[this.selectedSubcategory][index].error = false;
          }
        }
      }
    },

    maybeResetDescription(index) {
      const selectedDescription = this.items[this.selectedSubcategory][index]
        .description;
      console.log(selectedDescription);
      if (selectedDescription !== null) {
        const descriptionsForThisSubcategory = this.items[
          this.selectedSubcategory
        ][index].availableDescriptions;
        if (!descriptionsForThisSubcategory.includes(selectedDescription)) {
          this.items[this.selectedSubcategory][index].description = null;
        }
      }
    },

    maybeResetGlassColor(index) {
      const selectedGlassColor = this.items[this.selectedSubcategory][index]
        .glass_color_id;
      if (selectedGlassColor !== null) {
        const glassColorsForThisSubcategory = this.glassColors[
          this.selectedSubcategory
        ];
        // if the selected glass color cannot be found in colors for this category,
        // then unset the selected color
        if (
          glassColorsForThisSubcategory.findIndex(
            color => color.id === selectedGlassColor
          ) === -1
        ) {
          this.items[this.selectedSubcategory][index].glass_color_id = null;
        }
      }
    },

    maybeResetTrimColor(index) {
      const selectedTrimColor = this.items[this.selectedSubcategory][index]
        .trim_color_id;
      if (selectedTrimColor !== null) {
        const trimColorsForThisSubcategory = this.trimColors[
          this.selectedSubcategory
        ];
        // if the selected glass color cannot be found in colors for this category,
        // then unset the selected color
        if (
          trimColorsForThisSubcategory.findIndex(
            color => color.id === selectedTrimColor
          ) === -1
        ) {
          this.items[this.selectedSubcategory][index].trim_color_id = null;
        }
      }
    },

    removeItem(index) {
      this.items[this.selectedSubcategory].splice(index, 1);
      if (this.selectedSubcategory === 8 && this.items[8].length === 0) {
        this.showAddItemOnMainUnit = true;
      }
      this.showAddItem = true;
      this.$forceUpdate();
    },

    selectGlassColor(id, index) {
      this.items[this.selectedSubcategory][index].glass_color_id = id;
      this.$forceUpdate();
      this.maybeResetDescription(index);
      this.maybeResetTrimColor(index);
      this.getProducts(index);
      this.filterTrimColorsByGlassColor(index);
      this.filterDescriptionByGlassColor(index);
      this.$forceUpdate();
    },

    selectDescription(value, index) {
      this.items[this.selectedSubcategory][index].description = value.trim();
      this.maybeResetGlassColor(index);
      this.maybeResetTrimColor(index);
      this.getProducts(index);
      this.filterGlassColorsByDescription(index);
      this.filterTrimColorsByDescription(index);
      this.$forceUpdate();
    },

    selectItem(index) {
      this.selectedIndex = index;
    },

    selectSubcategory(id, name) {
      this.selectedSubcategory = id;
      this.selectedSubcategoryName = name;
    },

    selectTrimColor(id, index) {
      this.items[this.selectedSubcategory][index].trim_color_id = id;
      this.maybeResetGlassColor(index);
      this.maybeResetDescription(index);
      this.$forceUpdate();
      this.getProducts(index);
      this.$forceUpdate();
    },

    setupInitialSubcategories() {
      this.subCategories = this.initialData.subCategories;
      this.subCategories.forEach(subCategory => {
        this.items[subCategory.id] = [];
        this.glassColors[subCategory.id] = this.initialData.glassColors[
          subCategory.id
        ];
        this.trimColors[subCategory.id] = this.initialData.trimColors[
          subCategory.id
        ];
        this.descriptions[subCategory.id] = this.initialData.descriptions[
          subCategory.id
        ];
        this.products[subCategory.id] = this.initialData.products.filter(
          product => product.product_sub_category_id === subCategory.id
        );
        this.products[subCategory.id].forEach((product, index) => {
          this.products[subCategory.id][index].glass_color_id = Number(
            product.glass_color_id
          );
          this.products[subCategory.id][index].trim_color_id = Number(
            product.trim_color_id
          );
        });
      });
      this.selectedSubcategory = this.subCategories[0].id;
      this.selectedSubcategoryName = this.subCategories[0].name;
    },
    setupPreviousQuoteItems() {
      let quoteItems = this.quote.items.filter(
        item => item.product_category_id === 4
      );
      quoteItems.forEach(quoteItem => {
        let options = JSON.parse(quoteItem.options);
        const glassColor = options.find(
          option => option.key === "glass_color_id"
        );
        const trimColor = options.find(
          option => option.key === "trim_color_id"
        );
        const handles = options.find(option => option.key === "handles");
        const doorType = options.find(option => option.key === "door_type");
        const thickness = options.find(
          option => option.key === "glass_thickness"
        );
        const description = `${doorType.value} with ${handles.value} and ${thickness.value} glass`;
        console.log(description);
        this.selectedSubcategory = quoteItem.product_sub_category_id;
        this.addItem();
        let index = this.items[this.selectedSubcategory].length - 1;
        this.items[this.selectedSubcategory][index].trim_color_id = Number(
          trimColor.value
        );
        this.items[this.selectedSubcategory][index].glass_color_id = Number(
          glassColor.value
        );
        this.items[this.selectedSubcategory][index].description = description;
        this.showAddItem = false;
      });
      this.$forceUpdate();
    },

    validateData() {
      let items = [];
      this.subCategories.forEach(subCategory => {
        this.items[subCategory.id].forEach(quoteItem => {
          items.push(quoteItem);
          if (quoteItem.color === null || quoteItem.description === null) {
            alert("You must complete your selection.");
            this.selectedSubcategory = quoteItem.subCategory;
            this.items[quoteItem.subCategory][quoteItem.index].error = true;
            this.$forceUpdate();
            return false;
          }
        });
      });
      if (!items.length) {
        return confirm(
          "You haven't selected anything from this category. Are you sure you want to continue?"
        );
      }
      console.log("ok");
      return true;
    },

    verifyDataOnClick(event) {
      event.preventDefault();
      if (this.validateData()) {
        this.addToQuote();
        window.location.href = event.target;
      }
    }
  },

  computed: {
    boxWidth() {
      let index = this.subCategories.findIndex(
        subCat => subCat.id === this.selectedSubcategory
      );
      let width = this.subCategories[index].images.length || 4;
      return 100 / width + "%";
    }
  },

  created() {
    if (this.initialData) {
      this.glassColors = this.initialData.glassColors;
      this.trimColors = this.initialData.trimColors;
      this.descriptions = this.initialData.descriptions;
    }
    this.setupInitialSubcategories();
    this.setupPreviousQuoteItems();
    this.selectedSubcategory = this.subCategories[0].id;
    this.selectedSubcategoryName = this.subCategories[0].name;
    axios.get('/data/metallic-color/' + this.quote.lead_id).then(response => {
      this.preSelectedMetallicColorId = parseInt(response.data);
    })
  },

  mounted() {
    this.$emit("loaded");
    document.getElementById("next-link").onclick = this.verifyDataOnClick;
    document.getElementById("prev-link").onclick = this.verifyDataOnClick;
    document.getElementById(
      "save-finish-later"
    ).onclick = this.verifyDataOnClick;
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
