<script>
import Rubbish from './Rubbish'
import Edit from './Edit'
export default {
    props:{
        product: {},
        },
    components:{
        Rubbish,
        Edit
    },
    data() {
        return {
         showEditModal: false,
         showDeleteModal: false
        }

    },

    methods: {
        deleteProduct(id){
            this.$store.dispatch('deleteProduct', id)
        },

        editProduct(id){
            this.$store.dispatch('editProduct', id)
        },

        saveChanges(){
            console.log(this.editableProduct)
        },

        onEditSubmit(){
            var editedProduct = {
                "photo": this.$refs.photo.value,
                "brand": this.$refs.brand.value,
                "description": this.$refs.description.value,
                "price": this.$refs.price.value,
                "id": this.product.id,
                "gender" : this.product.gender,
                "category_id":this.product.category_id,
                "status": this.product.status,
                "stock": this.product.stock,

            }

            this.$store.dispatch('saveEditProduct', editedProduct)

            }
    },
}
</script>


<template>
    <div>
        <div class="admin-card">
        <!--<router-link :to="ProductDetailsPath" style="text-decoration : none">
            -->
            <div class="admin-card-image" style="overflow:hidden">
                <img :src=product.photo alt="" />
            </div>
       <!-- </router-link> -->
            <div class="admin-card-description">
                <span class="admin-card-description-brand">{{product.brand}}</span>
                <span class="admin-card-description-content">{{product.description}}</span>
                <span class="admin-card-description-price">{{product.price}} TL</span>
            </div>
            <div class="admin-card-buttons">
                <div class="admin-card-button" @click="showEditModal = true"><edit></edit></div>
                <div class="admin-card-button" @click="deleteProduct(product.id)"><rubbish></rubbish></div>
            </div>
    </div>

            <div class="modalOverlay" v-if="showEditModal || showDeleteModal" @click="showEditModal = false, showDeleteModal = false"></div>
            <div class="editModal" v-if="showEditModal">
                <form action="/api/admin/edit/" method="POST" @submit.prevent="onEditSubmit()">
                <div class="edit-item">
                     <div class="edit-item-wrapper">
                    <label for="photo">Photo URL</label>
                    <input type="url" ref="photo" name="photo" placeholder="Photo" :value ="product.photo">

                    <label for="brand">Brand</label>
                    <input type="text" ref="brand" name="brand" placeholder="Brand" :value ="product.brand">

                    <label for="description">Description</label>
                    <input type="text" ref="description" name="description" placeholder="Description" :value ="product.description">

                    <label for="price">Price</label>
                    <input type="number" ref="price" name="price" placeholder="Price" :value ="product.price">


                    <label for="category_id">Category ID</label>
                    <input type="number" ref="category_id" name="category_id" placeholder="Category ID" :value ="product.category_id">

                    <label for="stock">Stock</label>
                    <input type="number" ref="stock" name="stock" placeholder="Stock" :value ="product.stock">
                    
                    <label for="gender">Gender</label>
                    <input type="number" ref="gender" name="gender" placeholder="Gender" :value ="product.gender">
                    
                    <label for="status">Status</label>
                    <input type="number" ref="status" name="status" placeholder="Status" :value ="product.status">

                    <button type="submit" class="btn change">Save Changes</button>
                    <button class="btn cancel" @click="showEditModal = false"> Cancel </button>
                </div>
                </div>
                </form>
            </div>
    </div>
</template>
