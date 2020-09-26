export default {
    continueShopping: function (data) {
        return 'products';
    },
    updateCart(data) {
      return axios.post(`cart/update`, data)
    },
    deleteCart(id) {
        return axios.delete(`cart/${id}`);
    },
    checkout: function (data) {
        return 'checkout';
    },
    // CheckoutController@store
    placeOrder: function (data) {
        return axios.post(`/checkout`, data);
    }
};
