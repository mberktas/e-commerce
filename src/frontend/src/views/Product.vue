<script>
import loading from '../components/Loading'
import success from '../components/Success'
export default {
    components:{
        loading,
        success
    },
  data() {
      return {
          isLoading : true,
          product : Object,
          isAddCart : false,
      }
  },

  methods: {
      addToCart(){
          this.isAddCart = true
          setTimeout(() =>{
              this.isAddCart = false
          },3000);

             this.product.stock = this.product.stock- 1
            this.$store.dispatch("addToCart", this.product).then(() =>{
            })

      }
  },

  created() {
      this.$store
      .dispatch("fetchProductDetails", this.$route.params.id)
      .then(() => {
        this.isLoading = false;
        this.product = this.$store.state.productDetails;
      });
  }
};
</script>


<template>
  <div>
      <router-view></router-view>
    <loading v-if="isLoading"></loading>
    <div class="product-card">
      <div class="product-card-img">
        <img :src="product.photo" alt="" />
      </div>
      <div class="product-card-description">
        <div class="product-card-description-brand">
          <span>{{ product.brand }}</span>
        </div>
        <div class="product-card-description-name">
          <span>{{ product.description }}</span>
        </div>
        <div class="product-card-description-price">
          <span>{{ product.price }} TL</span>
        </div>
            <div class="addedToCart">
                <div v-show="isAddCart" class="success">
                <span>Added to Cart</span><success></success>
                </div>
            </div>
        <div class="product-card-description-add">
          <button class="btn" :disabled = "product.stock <= 0" :class="{disable : this.product.stock <= 0}" v-text="this.product.stock ? 'Add to Cart' : 'Not Available'" @click="addToCart">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
  </div>
</template>


<style src="../../public/app.css">

</style>
