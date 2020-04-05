import axios from 'axios'
import constPath from './constant.js'



export default{
    fetchAllProducts(){
        return axios.get('http://localhost:8000/api/products')
        .then((res) => {
            return res.data
        })
    },

    fetchProductDetails(id){
        return axios.get(`http://localhost:8000/api/productDetails/${id}`)
        .then((res) =>{
            return res.data
        });
    },


     getKeyByValue(object, value) {
        return Object.keys(object).find(key => object[key] === value);
    },

    // Admin Paneli Fonksiyonlari

    saveEditProduct(editedProduct){

        axios({
            method: 'post',
            url: 'http://localhost:8000/api/admin/edit/',
            data: editedProduct,
            headers: {
              "Content-Type": "application/json",
              "Cache-Control": "no-cache",
            }
          }).then(function (response) {
            console.log("Heade With Authentication :" + response);
          })
          .catch(function (error) {
            console.log("Post Error : " +error);
          });


    },
    fetchAllOrders(){
        return axios.get('http://localhost:8000/api/admin/orders').then((res) =>{
            return res.data
        })
    },

    addProduct(addedProduct){

       return axios({
            method: 'post',
            url: 'http://localhost:8000/api/admin/add/',
            data: addedProduct,
            headers: {
                "Content-Type": "application/json",
                "Cache-Control": "no-cache",
            }
        }).then((res) => {
            return res
        })
        .catch((err) =>{
            console.log(err)
        })
    },

    deleteProduct(id){
        return axios.get(`http://localhost:8000/api/admin/delete/${id}`).then(() =>{
            return id
        })
    },
    fetchAllProductsByCategory(category){
        var list = this.getKeyByValue(constPath.filterPathCategory, category)
        return axios.get(`http://localhost:8000/api/list/${list}`)
                .then((res) =>{
                    return res.data
                })
    },
    fetchOrderDetails(id){
        return axios.get(`http://localhost:8000/api/admin/order/${id}`).then((res) =>{
        return res.data
        })
    },

    paymentCart(paymentCart){

        axios({
            method: 'post',
            url: 'http://localhost:8000/api/payment/add',
            data: paymentCart,
            headers: {
                "Content-Type": "application/json",
                "Cache-Control": "no-cache",
            }
        }).then((res) => {
            return res
        })
        .catch((err) =>{
            console.log(err)
        })
    },

    fetchAllCustomers(){
        return axios.get('http://localhost:8000/api/admin/customers').then((res) =>{
            return res.data
        })
    }
}
