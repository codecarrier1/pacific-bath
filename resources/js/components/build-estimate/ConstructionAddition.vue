<template>
  <div class="px-16 py-12">
    <div class="flex">
      <div style="width:30rem;" class="mr-16 flex-shrink-0">
        <h2 class="text-24 font-bold mb-4">Construction &amp; Addition</h2>
        <ul class="font-bold text-18">
          <li
            v-for="(subcategory,index) in subCategories"
            :key="subcategory.id"
            :class="[subcategory.id === selectedSubcategory ? 'active-option' : '']"
            class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box"
            @click="selectSubcategory(subcategory)"
          >
            {{ subcategory['name'] }}
            <span
              class="qty text-white bg-blue-00849c rounded-full font-bold text-18 w-10 h-10 top-0 absolute flex justify-center items-center"
              v-if="getSelectedItemCount(items[subcategory.id]) > 0" style="right:10px;top:11px;line-height:44px;">{{ getSelectedItemCount(items[subcategory.id]) }}</span>
          </li>
        </ul>
      </div>
      <div class="w-full pt-16">
        <div v-if="items[selectedSubcategory].length > 0">
          <div
            v-for="(item,index) in items[selectedSubcategory]"
            :key="index"
            class="flex relative flex-wrap lg:flex-no-wrap mb-12 border-b-2 border-solid border-gray-e5e5e5 pb-12"
          >
            <div style="width:40.7rem" class="flex-shrink-0 mr-24">
              <h4 class="text-18 font-bold mb-6">{{ selectedSubcategoryName }} Addition #{{ index+1
                }}
                Options</h4>
              <ul class="text-18 font-bold">
                <li
                  v-for="(product,i) in products[selectedSubcategory]"
                  :key="i"
                  :class="[item.product.id === product.id ? 'active-option' : '']"
                  class="cursor-pointer rounded-10 border-2 border-solid border-gray-e5e5e5 mb-4 pl-8 pr-16 py-4 relative bg-gray-fafafa border-box"
                  @click="selectProduct(product, index)"
                >
                  <span class="capitalize">{{ product['name'] }}</span>
                  <i
                    class="fa fa-check text-white bg-blue-00849c rounded-full text-12 w-10 h-10 top-0 absolute flex justify-center items-center"
                    v-if="item.product.id === product.id"
                    style="right:10px;top:11px;line-height:44px;"></i>
                </li>
              </ul>
            </div>
            <div class="w-1/2">
              <div class="mb-16">
                <h4 class="text-18 font-bold mb-6">Description</h4>
               <span class="block"><textarea v-model="item.product.long_description" class="w-full h-full text-gray-666 bg-gray-f2f2f2 rounded-10 py-3 px-8 border-solid border-2 border-gray-e5e5e5 font-bold resize-none" ></textarea></span>
              </div>
              <div>
                <h4 class="text-18 font-bold mb-6">Quantity</h4>
                <div>
                  <span @click="decreaseQty(index)"
                        style="width:36px;height:36px; top:0;line-height:34px;"
                        class="inline-block text-gray-333 text-center cursor-pointer border-2 border-solid border-gray-e5e5e5 rounded-full align-middle"><i
                    class="fa fa-minus"></i></span>
                  <span
                    class="text-center inline-block align-middle w-24 px-4 text-32 text-gray-333"
                    style="line-height:40px;">{{ item.quantity }}</span>
                  <span @click="increaseQty(index)"
                        style="width:36px;height:36px; top:0;line-height:34px;"
                        class="inline-block text-gray-333 text-center  cursor-pointer border-2 border-solid border-gray-e5e5e5 rounded-full align-middle"><i
                    class="fa fa-plus"></i></span>
                </div>
              </div>
            </div>
            <span @click="removeProduct(index)"
                  style="width:36px;height:36px; top:0;line-height:34px;"
                  class="text-gray-333 text-center absolute right-0 cursor-pointer border-2 border-solid border-gray-e5e5e5 rounded-full"><i
              class="fa fa-times"></i></span>
          </div>
        </div>
        <span @click="addItem"
              class="text-18 font-bold border-2 border-solid border-gray-e5e5e5 rounded-20 block cursor-pointer text-center p-8">+ Add item</span>
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

    data() {
      return {
        items: {},
        selectedSubcategory: null,
        selectedSubcategoryName: '',
        subCategories: [],
        products: {},
      }
    },


    methods: {

      addItem() {
        const template = {
          product: this.products[this.selectedSubcategory][0],
          subCategory: this.selectedSubcategory,
          quantity: 1,
          index: this.items[this.selectedSubcategory].length, // The length will give us 1 more than the last index, which is also the next index, which is what we want here.
          error: false
        };

        this.items[this.selectedSubcategory].push(template);
        this.$forceUpdate();
      },

      addToQuote(nextPage) {
        let products = [];
        this.subCategories.forEach(subCategory => {
          this.items[subCategory.id].forEach(item => {
            products.push(this.formatQuoteRequest(item.quantity, item.product.id, item.product.long_description));
          });
        });
        axios
        .put("/data/update-quote", {
          quote_id: this.quote.id,
          products: products,
          product_category_id: 5
        })
        .then(() => window.location.href = nextPage);
      },

      decreaseQty(index) {
        if (this.items[this.selectedSubcategory][index].quantity > 0.5) {
          this.items[this.selectedSubcategory][index].quantity -= 0.5;
        }

        this.$forceUpdate();
      },


      formatQuoteRequest(quantity, productId, long_description) {
        return { quantity: quantity, product_id: productId, extra: {long_description} };
      },

      getSelectedItemCount(items) {
        const completedItems = items.filter(item => {
          return item.color !== null && item.description !== null
        });
        return completedItems.length;
      },

      increaseQty(index) {
        this.items[this.selectedSubcategory][index].quantity += 0.5;
        this.$forceUpdate();
      },


      selectProduct(product, index, quantity = 1) {
        this.items[this.selectedSubcategory][index].product = product;
        this.items[this.selectedSubcategory][index].quantity = quantity;
        this.items[this.selectedSubcategory][index].long_description = product.long_description
        this.$forceUpdate();
      },

      selectSubcategory(subcategory) {
        this.selectedSubcategory = subcategory.id;
        this.selectedSubcategoryName = subcategory.name;
      },


      setupInitialSubcategories() {
        this.subCategories = this.initialData.subCategories;
        this.products = this.initialData.products;
        this.subCategories.forEach(subCategory => {
          this.items[subCategory.id] = [];
        });
        this.selectedSubcategory = this.subCategories[0].id;
        this.selectedSubcategoryName = this.subCategories[0].name;
      },
      setupPreviousQuoteItems() {
        let quoteItems = this.quote.items.filter(item => item.product_category_id === 5);
        quoteItems.forEach(quoteItem => {
          let product = this.products[quoteItem.product_sub_category_id].find(product => product.id === quoteItem.product_id);
          if(quoteItem.long_description){
            product.long_description = quoteItem.long_description;
          }
          this.selectedSubcategory = quoteItem.product_sub_category_id;
          this.addItem();
          let index = this.items[this.selectedSubcategory].length - 1;
          this.selectProduct(product, index, Number(quoteItem.quantity));
        });
        this.$forceUpdate();
      },


      removeItem(index) {
        this.items[this.selectedSubcategory].splice(index, 1);
        this.$forceUpdate();
      },


      validateData() {
        let items = [];
        this.subCategories.forEach(subCategory => {
          this.items[subCategory.id].forEach(quoteItem => items.push(quoteItem));
        });
        if (!items.length) {
          return confirm(
            "You haven't selected anything from this category. Are you sure you want to continue?");
        }
        return true;
      },

      verifyDataOnClick(event) {
        event.preventDefault();
        if (this.validateData()) {
          this.addToQuote(event.target)
        }
      },


      removeProduct(index) {
        this.items[this.selectedSubcategory].splice(index, 1);
        this.$forceUpdate();
      },
    },

    created() {
      this.setupInitialSubcategories();
      this.setupPreviousQuoteItems();
      this.selectedSubcategory = this.subCategories[0].id;
      this.selectedSubcategoryName = this.subCategories[0].name;
    },

    mounted() {
      this.$emit("loaded");
      document.getElementById("next-link").onclick = this.verifyDataOnClick;
      document.getElementById("prev-link").onclick = this.verifyDataOnClick;
      document.getElementById("save-finish-later").onclick = this.verifyDataOnClick;
    },
  }
</script>

<style>
  .active-option {
    border-color: #00849c;
    border-width: 3px;
    padding: 9px 19px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, .11);
    font-weight: bold;
    background: #fff;
  }
</style>
