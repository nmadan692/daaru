<div class="filter__item">
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="filter__sort">
                <span>Sort By</span>
                <select name="sortBy" onchange="sortBy(this)">
                    <option value="name" {{ request()->get('sortBy') == 'name' ? 'selected' : null }}>Product</option>
                    <option value="price" {{ request()->get('sortBy') == 'price' ? 'selected' : null }}>Price</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="filter__found">
                <h6><span>{{ $products->total() }}</span> Products found</h6>
            </div>
        </div>
        <div class="col-lg-4 col-md-3">
            {{--            <div class="filter__option">--}}
            {{--                <span class="icon_grid-2x2"></span>--}}
            {{--                <span class="icon_ul"></span>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
<div class="row">
    @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg"
                     data-setbg="{{ getResizedImage($product->image, \App\Daaruu\Constants\ImageSizeConstant::PRODUCT_270_270) }}">
                    <ul class="product__item__pic__hover">
                        @if($product->quantity == 0)
                            <li class="list-active">
                                <span class="out-of-stock">Out of Stock</span>
                            </li>
                        @else
                            @if(isInWishList($product->id))
                                <li class="list-active">
                                    <a href="{{ route('my-wish-list') }}">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('product.shop.add', ['id' => encrypt($product->id), 'quantity' => 1, 'action'=> 'wishList']) }}">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                            @endif

                            @if(isInCart($product->id))
                                <li class="cart-active">
                                    <a href="{{ route('my-cart') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('product.shop.add', ['id' => encrypt($product->id), 'quantity' => 1, 'action'=> 'cart']) }}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>

                <div class="product__discount__item__text">
                    <h5><a href="{{ route('product.show', ['id' => encrypt($product->id)]) }}">{{$product->name}}</a>
                    </h5>
                    @if($product->discount)
                        <div class="product__item__price">{{ $product->discount_price }}
                            <span>{{ $product->original_price }}</span></div>
                    @else
                        <div class="product__item__price">{{ $product->original_price }}</div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $products->links() }}
{{--<div class="product__pagination">--}}
{{--    <a href="#">1</a>--}}
{{--    <a href="#">2</a>--}}
{{--    <a href="#">3</a>--}}
{{--    <a href="#"><i class="fa fa-long-arrow-right"></i></a>--}}
{{--</div>--}}


@push('script')
    <script>
        $(document).ready(function () {
            var message = @json(session()->get('message'));
            var status = @json(session()->get('status')) ??
            'success';
            if (message) {
                if (status == 'success') {
                    toastr.success(message);
                } else if (status == 'error') {
                    toastr.error(message);
                }
            }
        });
    </script>
@endpush
