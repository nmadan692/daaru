<template>
    <form @submit.prevent="handleSubmit" method="post">
        <div class="row">
            <div v-if="!isAuthenticated" class="col-lg-8 col-md-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p :class="errors.first('first_name') ? 'danger' : null">First Name<span>*</span></p>
                            <input :class="errors.first('first_name') ? 'input-danger' : null" v-validate="'required'" type="text" name="first_name" v-model="formData.first_name">
                            <span class="danger">{{ errors.first('first_name') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p :class="errors.first('last_name') ? 'danger' : null">Last Name<span>*</span></p>
                            <input :class="errors.first('last_name') ? 'input-danger' : null" v-validate="'required'" type="text" name="last_name" v-model="formData.last_name">
                            <span class="danger">{{ errors.first('last_name') }}</span>
                        </div>
                    </div>
                </div>
                <div class="checkout__input">
                    <p :class="errors.first('address1') ? 'danger' : null">Address<span>*</span></p>
                    <input :class="errors.first('address1') ? 'input-danger' : null" v-validate="'required'" type="text" name="address1" placeholder="Street Address" class="checkout__input__add" v-model="formData.address1">
                    <input type="text" name="address2" placeholder="Apartment, suite, unite ect (optional)" v-model="formData.address2">
                    <span class="danger">{{ errors.first('address1') }}</span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p :class="errors.first('phone') ? 'danger' : null">Phone<span>*</span></p>
                            <input :class="errors.first('phone') ? 'input-danger' : null" v-validate="'required'" type="text" name="phone" v-model="formData.phone">
                            <span class="danger">{{ errors.first('phone') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p :class="(inputErrors.email || errors.first('email')) ? 'danger' : null">Email<span>*</span></p>
                            <input :class="(inputErrors.email || errors.first('email')) ? 'input-danger' : null" v-validate="'required'" type="text" name="email" v-model="formData.email">
                            <span class="danger">{{ errors.first('email')}}</span>
                            <span class="danger" v-if="((inputErrors.email) && (!errors.first('email')))">{{ inputErrors.email[0]}}</span>
                        </div>
                    </div>
                </div>
                <div class="checkout__input">
                    <p :class="errors.first('password') ? 'danger' : null">Account Password<span>*</span></p>
                    <input :class="errors.first('password') ? 'input-danger' : null" v-validate="'required'" type="password" name="password" v-model="formData.password">
                    <span class="danger">{{ errors.first('password') }}</span>
                </div>
                <div class="checkout__input">
                    <p>Order notes</p>
                    <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="note" v-model="formData.note">
                </div>
            </div>
            <div v-if="!isAuthenticated" class="col-lg-4 col-md-6">
                <your-order :products="products" :submit-text="submitText"></your-order>
            </div>
            <div v-else class="col-lg-12">
                <your-order :products="products" :submit-text="submitText"></your-order>
            </div>
        </div>
    </form>
</template>

<script>
    import YourOrder from './your-order'
    import front from "../../api/front";
    import {Validator} from 'vee-validate';

    const dictionary = {
        en: {
            attributes: {
                'first_name': 'first name',
                'last_name': 'last name',
                'address1': 'address'
            },
        }
    };
    Validator.localize(dictionary);

    export default {
        props: {
            products : {
                type: Object,
                default() {
                    return {};
                }
            },
            isAuthenticated: {
                type: Boolean,
                default() {
                    return false;
                }
            }
        },
        data() {
            return {
                inputErrors : {
                },
                submitText: 'PLACE ORDER',
                formData: {
                }
            }
        },
        methods: {
            handleSubmit(e) {
                let self = this;
                self.submitText = '<i class="fa fa-spinner fa-spin"></i> Please Wait';
                e.target.querySelector('button[type=submit]').disabled = true;
                self.$validator.validateAll().then((valid) => {
                    if (valid) {
                        front.placeOrder(self.formData).then(res => {
                            if (res.status == 200) {
                                front.myOrder();
                                // toastr.success('Order Placed Successfully.', 'Success');
                            }
                            else {
                                toastr.error('Sorry something went wrong.', 'Error');
                            }
                        }).catch(res => {
                            if (res.response.status == 422) {
                                self.inputErrors = res.response.data.errors
                            }
                            toastr.error('Sorry something went wrong.', 'Error');
                        });
                        e.target.querySelector('button[type=submit]').disabled = false;
                        self.submitText = 'Place Order';
                    }
                    else    {
                        e.target.querySelector('button[type=submit]').disabled = false;
                        self.submitText = 'Place Order';
                    }
                });
            }
        },
        components: {
            'your-order' : YourOrder
        },
    }
</script>
