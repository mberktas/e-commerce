<script>
import Navbar from './Navbar'
import CartIcon from '../components/CartIcon'

export default {
    computed: {
        numberOfItems(){
          return this.$store.state.cart.length
        }
    },
    components:{
        Navbar,
        CartIcon,
    }
}
</script>


<template>
    <div>
       <header>
        <div class="container">
            <div class="logo">
                <router-link to="/"><img src="../assets/logo.png" alt="logo"></router-link>
            </div>



            <div class="user">
                <router-link to="/cart" class="link">
                <div class="user-basket">
                <cart-icon class="user-basket-icon"></cart-icon>
                    <span>Cart:</span>
                    {{numberOfItems}}
                </div>
                </router-link>
                <div class="user-icon">
                </div>
                <div class="user-username">Muhammet Berktaş</div>
            </div>
        </div>
    </header>
    <navbar></navbar>
    </div>
</template>

