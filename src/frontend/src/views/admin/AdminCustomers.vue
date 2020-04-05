<script>
import AdminNavbar from '../../components/admin/AdminNavbar'
export default {
    components:{
        AdminNavbar,
    },
    data() {
        return {
            customers: [],
        }
    },

    methods: {
        fetchAllCustomers(){
            this.$store.dispatch('fetchAllCustomers').then((customers) => {
                this.customers = customers
                console.log(this.customers)
            })
        }
    },

    created() {
        this.fetchAllCustomers()
    },
}
</script>

<template>
  <div>
    <admin-navbar></admin-navbar>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
      </tr>

      <tr v-for="customer in customers" :key="customer.id">
        <td>{{ customer.id }}</td>
        <td>{{ customer.name }}</td>
        <td>{{ customer.surname }}</td>
        <td>{{ customer.email }}</td>
        <td>{{ customer.mobile }}</td>
        <td>{{ customer.status }}</td>
      </tr>
    </table>
  </div>
</template>
