<div class="col-lg-4 col-md-6">
    <div class="checkout__order">
        <h4>Your Order</h4>
        <div class="checkout__order__products">Products <span>Total</span></div>
        <ul>
            <p style="display: none;">{{ $quantity = 0 }} </p>
        @forelse($products as $product)
            <li>{{$product['product']->name }} <span>{{ 'Nrs '. $product['product']->discount_amount * $product['quantity']}}</span></li>
                <p style="display: none;">{{ $quantity+= $product['product']->discount_amount * $product['quantity'] }} </p>
            @empty
                <p>No Products found.</p>
            @endforelse
        </ul>
{{--        <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>--}}
        <div class="checkout__order__total">Total <span>{{'Nrs '. $quantity ?? 0 }}</span></div>

        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua.</p>

        <button type="submit" class="site-btn">PLACE ORDER</button>
    </div>
</div>
