<template>
    <div class="col-lg-4 col-md-6">
        <div class="checkout__order">
            <h4>Your Order</h4>
            <div class="checkout__order__products">Products <span>Total</span></div>
            <ul>
                <template v-for="(product) in products">
                    <li>{{product.product.name }} <span>{{ 'Nrs ' + product.product.discount_amount * product.quantity}}</span></li>
                </template>
            </ul>
            <div class="checkout__order__total">Total <span>{{'Nrs '+ quantity }}</span></div>

            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua.</p>

            <button type="submit" class="site-btn" v-html="submitText"></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            products : {
                type: Object,
                default() {
                    return {};
                }
            },
            submitText: {
                type: String,
                default() {
                    return 'Place Order';
                }
            }
        },
        data() {
            return {
                quantity: 0,
            }
        },
        mounted() {
            let self = this;
            self.$nextTick(function () {
                _.forEach(self.products, function(product) {
                    self.incrementQuantity(product.product.discount_amount, product.quantity)
                });
            })
        },
        methods: {
            incrementQuantity(amount, quantity) {
                this.quantity = this.quantity+(amount*quantity);
            }
        }
    }
</script>
