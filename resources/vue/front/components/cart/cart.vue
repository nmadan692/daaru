<template>
    <div class="container">
        <template v-if="productsData.length">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(product,index) in productsData">
                                <td class="shoping__cart__item">
                                    <img src="" alt="">
                                    <h5>{{ product.name  }} </h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ product.discount_price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="cart-qty">
                                            <span class="dec qtybtn" @click="decrementQuantity(index)">-</span>
                                            <input type="text" v-model="product.quantity">
                                            <span class="inc qtybtn" @click="incrementQuantity(index)">+</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{ 'NRs '+ product.quantity * product.discount_amount }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span @click="deleteCart(index)" class="icon_close"></span>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a :href="continueShopping()" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <button @click="updateCart" class="primary-btn cart-btn cart-btn-right ml-2 no-border">Update Cart</button>
                        <button @click="resetCart" class="primary-btn cart-btn cart-btn-right no-border">Reset</button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span>{{ 'NRs ' + total }}</span></li>
                        </ul>
                        <a :href="handleCheckout()" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </template>
        <template v-else>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5 class="text-center">No Products added in cart.</h5>
                        <a :href="continueShopping()" class="primary-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import front from "../../api/front";

    export default {
        props: {
            products: {
                type: Object,
                default() {
                    return {};
                }
            },

        },
        mounted() {
            let self =  this;
            self.$nextTick(function () {
                self.populateTemporaryProductsData(self.products);
            })
        },
        data() {
            return {
                productsData: [],
                tempProductsData: [],
                total: 0
            }
        },
        methods: {
            incrementQuantity(index) {
                let self = this;
                self.productsData[index].quantity++;
            },
            decrementQuantity(index) {
                let self = this;
                self.productsData[index].quantity--;
            },
            resetCart() {
                let self = this;
                self.productsData = [];
                self.total = 0;
                self.populateProductsData();

            },
            populateTemporaryProductsData(products) {
                let self = this;
                _.forEach(products, function(product, key) {
                    self.tempProductsData.push({
                        'id': product['product'].id,
                        'name': product['product'].name,
                        'price': product['product'].price,
                        'discount_amount' : product['product'].discount_amount,
                        'discount_price': product['product'].discount_price,
                        'quantity': parseInt(product['quantity'])
                    }) ;
                });
                self.populateProductsData();
            },
            populateProductsData() {
                let self = this;
                self.productsData = [];
                _.forEach(self.tempProductsData, function(product, key) {
                    self.productsData.push({
                        'id': product.id,
                        'name': product.name,
                        'price': product.price,
                        'discount_amount' : product.discount_amount,
                        'discount_price': product.discount_price,
                        'quantity': parseInt(product.quantity)
                    }) ;
                    self.total+= (product.discount_amount*product.quantity)
                });
            },
            continueShopping() {
                return front.continueShopping();
            },
            updateCart() {
                let self = this;
                front.updateCart(self.productsData).then(res => {
                    if (res.status == 200) {
                        self.total = 0;
                        self.tempProductsData = [];
                        _.forEach(self.productsData, function(product, key) {
                            self.tempProductsData.push({
                                'id': product.id,
                                'name': product.name,
                                'price': product.price,
                                'discount_amount' : product.discount_amount,
                                'discount_price': product.discount_price,
                                'quantity': parseInt(product.quantity)
                            }) ;
                            self.total+= (product.discount_amount*product.quantity)
                        });
                    }
                }).catch(res => {
                    alert('Sorry something went wrong.')
                })
            },
            deleteCart(index) {
                let self = this;
                front.deleteCart(self.productsData[index].id).then(res => {
                    if (res.status == 200) {
                        alert('Successfully Deleted Product from my cart.')
                        self.tempProductsData.splice(index, 1);
                        self.productsData = [];
                        self.total = 0;
                        self.populateProductsData();
                    }
                }).catch(res => {
                    alert('Sorry something went wrong.')
                });
            },
            handleCheckout() {
                return front.checkout();
            }
        }
    }
</script>
