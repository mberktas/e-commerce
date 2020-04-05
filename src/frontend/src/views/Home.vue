<script>
import Card from "../components/Card";
import Loading from "../components/Loading";
import { mapState } from 'vuex';

export default {
  name: "Home",
  components: {
    Card,
    Loading,
  },


  data() {
    return {
      isLoading: true,
      categoryName: 'New In',
        products:[]
    };
  },

  computed: {

    productsChange(){
        return mapState(['products'])
    },
    productsState(){
        return this.$store.state.products
    },
    filterPath(){
        return this.$route.params.id
    },
  },

  methods: {
       path(filter){
            if(this.$route.path.includes('/filter')){
                let index = this.$route.fullPath.search('/filter')
                return this.$route.fullPath.slice(0,index)+'/filter/'+filter
            }
            if(this.$route.path == '/')
                return this.$route.fullPath + 'filter/'+ filter
        return this.$route.fullPath + '/filter/'+ filter
        },
      setLoading(){
          this.isLoading = !this.isLoading
      },

    filterBy(filter){
        let idParam = this.$route.params.id
        let genderParam = this.$route.params.gender
        this.categoryName = filter
        this.isLoading = true
        this.$store.dispatch("fetchAllProductsByFilter", [genderParam , idParam]).then(() =>{
            this.isLoading = false
        })
    },
    fetchAllProducts(){
        this.isLoading = true
        this.$store.dispatch("fetchAllProducts").then(() => {
        this.isLoading = false
        this.products = this.productsState
 });

  },
  getProducts(){
        this.products = this.$store.state.products
    },

  filterByGender(gender){
      this.products = this.productsState
        this.products = this.products.filter(product => product.gender == gender)

            // cinsiyete göre filterelmeyi yap
    },
    allProduct(){
        this.products = this.productsState
    }
  },
  created() {
      this.fetchAllProducts()

      this.unsubscribe = this.$store.subscribe((mutation, state) => {
          if(mutation.type == 'setProducts'){
              this.products = state.products
          }

      })
      },
    }
</script>

<template>
<div>
    <router-view></router-view>
  <div class="main">
    <div class="container">
      <div class="filter-helper">
        <span>{{categoryName}}</span>
        <div class="filter-helper-container">
          <div class="filter-helper-item" @click="allProduct">All</div>
          <div class="filter-helper-item" @click="filterByGender(0)">Women</div>
          <div class="filter-helper-item" @click="filterByGender(1)">Men</div>
        </div>
      </div>
      <loading v-if="isLoading"></loading>
      <div class="items">
        <card
          v-for="product in products"
          :key="product.id"
          :product="product"
        ></card>
      </div>
    </div>
  </div>
  </div>
</template>

