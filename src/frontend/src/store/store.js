import Vue from 'vue'
import Vuex from 'vuex'
import service from '../services/service'
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        products: [],
        productDetails: {},
        cart: [],
        orders: [],
        category: ''
    },
    getters: {
    },
    mutations: {
        setProducts(state, products) {
            state.products = products
        },
        setProductDetails(state, productDetails) {
            state.productDetails = productDetails
        },
        setProductsByFilter(state, products) {
            state.products = products
        },
        setCategory(state, category){
            state.category = category
        },

        setOrders(state, orders){
            state.orders = orders
        },
        addToCart(state, product) {
            state.cart.push({
                product
            })
        },
        deleteCart(state){
            state.cart = []
        },
        removeItemFromCart(state, id) {
            var i = state.cart.length
            while (i--) {
                if (state.cart[i].product['id'] == id) {
                    state.cart.splice(i, 1)
                    break
                }
            }
        },

        deleteProduct(state, id) {
            var j = state.products.length
            while (j--) {
                if (state.products[j]['id'] == id) {
                    state.products.splice(j, 1)
                    break;
                }
            }
        },
        addProduct(state, product) {
            state.products.push(product)
        }
    },
    actions: {
        fetchAllProducts(context) {
            return service.fetchAllProducts().then((res) => {
                context.commit('setProducts', res)
            });
        },
        fetchProductDetails(context, id) {
            return service.fetchProductDetails(id).then((res) => {
                context.commit('setProductDetails', res)
            });
        },

        addToCart(context, product) {
            return context.commit('addToCart', product)
        },

        removeItemFromCart(context, id) {
            return context.commit('removeItemFromCart', id)
        },

        // Admin Paneli Edit ve Delete fonksiyonları
        saveEditProduct(context, editedProduct) {
            service.saveEditProduct(editedProduct).then(() => {
                context.commit('editProduct', editedProduct)
            })
        },
        deleteProduct(context, id) {
            service.deleteProduct(id).then(() => {
                context.commit('deleteProduct', id)


            })
        },
        addProduct(context, addedProduct) {
            service.addProduct(addedProduct).then(() => {
                context.commit('addProduct', addedProduct)
            })
        },
        fetchAllProductsByCategory(context, category) {
            service.fetchAllProductsByCategory(category).then((res) => {
                context.commit('setProducts', res)
                context.commit('setCategory', category)
            })

        },
        paymentCart(context, paymentCart) {
            return service.paymentCart(paymentCart)
        },

        fetchAllOrders(context){
            service.fetchAllOrders().then((res) => {
                context.commit('setOrders', res)
            })
        },
        fetchOrderDetails(context,id){
            return service.fetchOrderDetails(id).then((res) => {
                return res
            })
        },
        fetchAllCustomers(){
            return service.fetchAllCustomers().then((res) => {
                return res
            })
        }

    },
    modules: {},
})
