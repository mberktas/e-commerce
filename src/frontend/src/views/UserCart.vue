<script>
export default {
    computed: {
        cart(){
            return this.$store.state.cart
        },

        cartNumberOfItem(){
            return this.$store.state.cart.length
        },

        cartTotalPrice(){
            let total = 0
            for(let i=0 ; i<this.cartNumberOfItem ; i++){
                total += parseFloat(this.cart[i].product['price'])
            }
            return total.toFixed(2)
        }
    },

    methods: {
        removeItemFromCart(id){
            this.$store.dispatch('removeItemFromCart', id).then(()=>{
            })
        }
    },
}
</script>




<template>
    <div>
      <router-view></router-view>
        <div style="text-align:center; width:100%; margin-top:40px; font-weigth:bold; font-size:36px;" v-if="cartNumberOfItem <= 0">Your cart is empty</div>
        <div class="container" style="margin-top:40px" :style="{visibility : cartNumberOfItem > 0 ? 'visible' : 'hidden'}">
            <div class="cart-wrapper">
                <div class="cart-item" v-for="item in cart" :key="item.id">
                    <div class="cart-item-image">
                        <img :src="item.product.photo" alt="item-photo">
                    </div>
                    <div class="cart-item-description">
                        <div class="cart-item-description-brand">{{item.product.brand}}</div>
                        <div class="cart-item-description-content">{{item.product.description}}</div>
                        <div class="cart-item-description-price">{{item.product.price}}</div>
                    </div>
                    <div class="cart-item-remove">
                        <a @click="removeItemFromCart(item.product.id)">&times;</a>
                    </div>
                </div>
            </div>
        <div class="cart-total">
            <div class="cart-total-description">
                <div class="cart-total-description-order"> ORDER SUMMARY</div>
            <div class="cart-total-description-item">Total Product : {{cartNumberOfItem}}</div>
            <div class="cart-total-description-price">Total Price : <span style="font-weight:bold;">{{cartTotalPrice}} TL</span> </div>
            </div>
                <router-link to="/cart/payment" class="cart-btn"><button class="btn">Confirmation to Cart</button></router-link>
        </div>
        </div>
    </div>
</template>
