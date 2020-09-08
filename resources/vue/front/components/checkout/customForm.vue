<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="checkout__input">
                    <p>First Name<span>*</span></p>
                    <input type="text" name="first_name[]">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="checkout__input">
                    <p>Last Name<span>*</span></p>
                    <input type="text" name="last_name[]">
                </div>
            </div>
        </div>
        <div class="checkout__input">
            <p>Address<span>*</span></p>
            <input type="text" name="address1[]" placeholder="Street Address" class="checkout__input__add" >
            <input type="text" name="address2[]" placeholder="Apartment, suite, unite ect (optional)">
        </div>
        <div class="checkout__input__radio">
            <p>Town/City<span>*</span></p>
            <span>
            <input type="radio" name="city[]" value="Biratnagar" checked>
            <label> Biratnagar </label>
        </span>
            <span>
            <input type="radio" name="city[]" value="Dharan">
            <label> Dharan </label>
        </span>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="checkout__input">
                    <p>Phone<span>*</span></p>
                    <input type="text" name="phone[]">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="checkout__input">
                    <p>Email<span>*</span></p>
                    <input type="text" name="email[]">
                </div>
            </div>
        </div>
    </div>
</template>
