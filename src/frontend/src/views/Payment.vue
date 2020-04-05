<script>
import Success from '../components/Success'
export default {
    components:{
        Success
    },
    data() {
        return {
        isSuccess : false // işlem basariliysa success modali gösterecek
        }
    },

    methods: {
        onPaymentSubmit(){
            var paymentCart = {
               "name" : this.$refs.name.value,
                "surname" : this.$refs.surname.value,
                "email" : this.$refs.email.value,
                "mobile" : this.$refs.tel.value,
                "address" : this.$refs.address.value,
                "cart" : this.cart,
                "totalAmount" : this.cartTotalPrice,
                "status" : 1
                /*"credit_card" : this.$refs.credit_card.value,
                "credit_cvv" : this.$refs.credit_cvv.value,
                "credit_name" : this.$refs.credit_name.value,
                */
            }

            this.$store.dispatch('paymentCart',paymentCart).then(() =>{
                this.isSuccess = true
                setTimeout(() => {
                    this.$store.commit('deleteCart')
                    this.$router.push('/')

                },2000)
            })
        },
    },
    computed: {
        cart(){
            return this.$store.state.cart
        },
          cartTotalPrice(){
            let total = 0
            for(let i=0 ; i<this.cart.length ; i++){
                total += parseFloat(this.cart[i].product['price'])
            }
            return total.toFixed(2)
        }
    },
}
</script>


<template>
  <div>
      <router-view></router-view>
    <div class="container">
      <div class="payment">
        <form action="" @submit.prevent = "onPaymentSubmit">
          <input class="payment-name" ref="name" type="text" placeholder="Name" />
          <input class="payment-surname" ref="surname" type="text" placeholder="Surname" />
          <input class="payment-email" ref="email" type="email" placeholder="Email" />
          <input
            type="tel"
            ref="tel"
            placeholder="0(___) ___ __ __"
          />
          <textarea name="" id="" cols="30" rows="10" ref="address" placeholder="Address"></textarea>
          <hr style="width:80%; margin-top:10px;">
                <input type="text" ref="credit_card" placeholder="Credit Card No">
                <input type="text" ref="credit_cvv" placeholder="Cart CVV">
                <input type="text" ref="credit_name" placeholder="Cart  Name">



            <button type="submit" class="btn submit-btn">Confirm</button>

            <div class="modalOverlay" v-if="isSuccess"></div>
            <div class="successModal" v-if="isSuccess">
                <success style="width:100%;"></success>
                Ödeme Başarıyla Gerçekleşti
            </div>
        </form>
      </div>
    </div>
  </div>
</template>


<style>
    .successModal{
        display: flex;
        flex-wrap: wrap;
        place-content: center;
        text-align: center;
        z-index: 99;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50% , -50%);
        background-color: white;
        width: 50%;
        height: 50%;
    }
</style>
