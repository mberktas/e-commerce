<script>
import {mapActions } from 'vuex'
export default {
    methods: {
        ...mapActions ([
            'fetchAllProducts',
        ]),
        fetchAllProductsByCategory(category){

            this.$store.dispatch("fetchAllProductsByCategory", category).then(() =>{
        })
        }
    },
    computed: {
        filterPath(){
        return this.$route.params.id
        }
    },
}
</script>

<template>
    <div>
    <nav class="navbar">
        <div class="sidebar-container">
            <router-link to="/" class="sidebar-container-item" @click.native = "fetchAllProducts">New In</router-link>
            <router-link to="/list/shoes" class="sidebar-container-item" @click.native = "fetchAllProductsByCategory(filterPath)">Shoes</router-link>
            <router-link to="/list/clothes" class="sidebar-container-item"  @click.native = "fetchAllProductsByCategory(filterPath)">Clothing</router-link>
        </div>
    </nav>
</div>
</template>


