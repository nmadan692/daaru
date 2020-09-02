export default {
    continueShopping: function (data) {
        return 'products';
    },
    deleteCart(id) {
        return axios.delete(`cart/${id}`);
    }
};
