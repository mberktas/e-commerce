<script>
import AdminNavbar from "../../components/admin/AdminNavbar";
export default {
  components: {
    AdminNavbar
  },
  data() {
    return {
      showDetailsModal: false,
      orderDetails : []
    };
  },
  methods: {
    fetchAllOrders() {
      this.$store.dispatch("fetchAllOrders");
    },
    showDetails(id){
        this.showDetailsModal = true
        this.$store.dispatch('fetchOrderDetails',id).then((res) => {
            this.orderDetails = res
        })
    }

  },

  computed: {
    orders() {
      return this.$store.state.orders;
    }
  },
  created() {
    this.fetchAllOrders();
  }
};
</script>

<template>
  <div>
    <admin-navbar></admin-navbar>
    <table>
      <tr>
        <th>ID</th>
        <th>Customer ID</th>
        <th>Address</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Details</th>
      </tr>

      <tr v-for="order in orders" :key="order.id">
        <td>{{ order.id }}</td>
        <td>{{ order.customer_id }}</td>
        <td>{{ order.address }}</td>
        <td>{{ order.totalAmount }}</td>
        <td>{{ order.status }}</td>
        <td @click="showDetails(order.id)" class="table-details">Details</td>
      </tr>
    </table>

    <div class="modalOverlay" @click="showDetailsModal = false" v-if="showDetailsModal"></div>
    <div class="details-modal" v-if="showDetailsModal">
      <table>
        <tr>
          <th>ID</th>
          <th>Brand</th>
          <th>Description</th>
          <th>Price</th>
        </tr>

        <tr v-for="order in orderDetails" :key="order.id">
            <th>{{order.id}}</th>
            <th>{{order.brand}}</th>
            <th>{{order.description}}</th>
            <th>{{order.price}}</th>
        </tr>
      </table>
    </div>
  </div>
</template>
