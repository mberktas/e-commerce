<script>
import AdminNavbar from "../../components/admin/AdminNavbar";
import AdminCard from "../../components/admin/AdminCard";
import Add from "../../components/admin/Add";
export default {
  props: {
    items: Array
  },
  components: {
    AdminNavbar,
    AdminCard,
    Add
  },
  data() {
    return {
      showAddModal: false
    };
  },
  computed: {
    products() {
      return this.$store.state.products;
    }
  },
  methods: {
    fetchAllProducts() {
      this.isLoading = true;
      this.$store.dispatch("fetchAllProducts").then(() => {
        this.isLoading = false;
      });
    },

    onAddSubmit() {
      var addedProduct = {
        photo: this.$refs.photo.value,
        brand: this.$refs.brand.value,
        description: this.$refs.description.value,
        price: this.$refs.price.value,
        gender: this.$refs.gender.value,
        category_id: this.$refs.category_id.value,
        status: this.$refs.status.value,
        stock: this.$refs.stock.value
      };

      this.$store.dispatch("addProduct", addedProduct);
    }
  },
  created() {
    this.fetchAllProducts();
  }
};
</script>

<template>
  <div>
    <admin-navbar></admin-navbar>
    <div class="admin-main">
      <div @click="showAddModal = true">
        <add class="add-icon admin-card-button"></add>
      </div>
      <div class="container">
        <admin-card
          v-for="product in products"
          :key="product.id"
          :product="product"
        ></admin-card>

        <div
          class="modalOverlay"
          v-if="showAddModal"
          @click="showAddModal = false"
        ></div>
        <div class="editModal" v-if="showAddModal">
          <form
            action="/api/admin/edit/"
            method="POST"
            @submit.prevent="onAddSubmit()"
          >
            <div class="edit-item">
              <div class="edit-item-wrapper">
                <label for="photo">Photo URL</label>
                <input
                  type="url"
                  ref="photo"
                  name="photo"
                  placeholder="Photo"
                />

                <label for="brand">Brand</label>
                <input
                  type="text"
                  ref="brand"
                  name="brand"
                  placeholder="Brand"
                />

                <label for="description">Description</label>
                <input
                  type="text"
                  ref="description"
                  name="description"
                  placeholder="Description"
                />

                <label for="price">Price</label>
                <input
                  type="number"
                  ref="price"
                  name="price"
                  placeholder="Price"
                />

                <label for="category_id">Category ID</label>
                <input
                  type="number"
                  ref="category_id"
                  name="category_id"
                  placeholder="Category ID"
                />

                <label for="stock">Stock</label>
                <input
                  type="number"
                  ref="stock"
                  name="stock"
                  placeholder="Stock"
                />

                <label for="gender">Gender</label>
                <input
                  type="number"
                  ref="gender"
                  name="gender"
                  placeholder="Gender"
                />

                <label for="status">Status</label>
                <input
                  type="number"
                  ref="status"
                  name="status"
                  placeholder="Status"
                />

                <button type="submit" class="btn change">Add Item</button>
                <button class="btn cancel" @click="showAddModal = false">
                  Cancel
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
