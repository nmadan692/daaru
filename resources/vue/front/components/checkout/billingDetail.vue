<template>
    <div class="col-lg-8 col-md-6">
        <custom-form></custom-form>
        <div class="checkout__input__checkbox">
            <label for="acc">
                Create an account?
                <input type="checkbox" id="acc" name="create_account" v-model="create_account">
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="checkout__input" v-if="create_account">
            <p>Account Password<span>*</span></p>
            <input type="password" name="password">
        </div>
<!--        <div class="checkout__input__checkbox" v-if="create_account">-->
<!--            <label for="diff-acc">-->
<!--                Ship to a different address?-->
<!--                <input type="checkbox" id="diff-acc" name="different_shipping" v-model="different_shipping">-->
<!--                <span class="checkmark"></span>-->
<!--            </label>-->
<!--        </div>-->
<!--        <custom-form v-if="create_account && different_shipping"></custom-form>-->
        <div class="checkout__input">
            <p>Order notes<span>*</span></p>
            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="note">
        </div>
    </div>
</template>

<script>
    import CustomForm from './customForm'
    export default {
        data() {
            return {
                create_account: false,
                different_shipping: false
            }
        },
        components: {
            'custom-form' : CustomForm
        },
        watch: {
            create_account: function(value, oldValue) {
                if(value == false) {
                    this.different_shipping = false
                }
            }
        }
    }
</script>
