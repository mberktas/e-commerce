import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Header from '../components/VueHeader'
import Home from '../views/Home.vue'
import Product from '../views/Product.vue'
import UserCart from '../views/UserCart.vue'
import Payment from '../views/Payment.vue'
import Admin from '../views/admin/Admin.vue'
import AdminOrders from '../views/admin/AdminOrders.vue'
import AdminCustomers from '../views/admin/AdminCustomers.vue'


const routes = [{

        path: '/',
        component: Home,
        meta:{
            title: 'Homepage',
        },
        children: [
            {
                path: '',
                component: Header,
                meta:{
                    title: 'Homepage'
                }
            }
        ]
    },
    {
        path: '/filter/:gender',
        component: Home,
        meta:{
            title: 'Shoes'
        },
        children:[
            {
                path:'',
                component: Header,
                meta:{
                    title: 'Shoes'
                }
            }
        ]
    },
    {
        path: '/product/:id',
        component: Product,
        children: [
            {
                path: '',
                component: Header,
                meta:{
                    title: 'Product'
                }
            },
        ]
    },
    {
        path: '/list/:id',
        component: Home,
        meta:{
            auth: true,
            title: 'deneme'
        },
        children: [
            {
                path: '',
                component: Header,
                meta:{
                    title: 'Products'
                }
            },
        ]
    },
    {
        path: '/list/:id/filter/:gender',
        component: Home,
        children: [
            {
                path: '',
                component: Header
            }
        ]
    },
    {
        path: '/cart',
        component: UserCart,
        children: [
            {
                path: '',
                component: Header,
                meta:{
                    title: 'Cart'
                }
            },
        ]
    },
    {
        path: '/cart/payment',
        component: Payment,
        children: [
            {
                path: '',
                component: Header,
                meta:{
                    title: 'Payment'
                }
            },
        ]
    },
    {
        path: '/admin',
        name: 'Admin',
        component: Admin,
        meta:{
            title: 'Admin'
        }
    },

    {
        path: '/admin/orders',
        component: AdminOrders,
        meta:{
            title: 'Orders'
        }
    },

    {
        path: '/admin/customers',
        component: AdminCustomers,
        meta:{
            title: 'Customers'
        }
    }

]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
