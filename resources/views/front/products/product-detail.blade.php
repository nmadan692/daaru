@extends('front.layouts.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('front')}}/img/daaruu.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Daaruu Dot Com</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home')}}">Home</a>
                            <a href="{{ route('products')}}">Products</a>
                            <span>Product-Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{ getImageUrl($product->image) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="product__details__price">{{ $product->discount_price }}
                        </div>
                        @if($product->discount)
                            <span class="product-discount">{{ $product->original_price }}</span>
                        @endif
                        <p>{!! $product->description !!}</p>
                        <form action="{{ route('product.shop.add', encrypt($product->id)) }}" method="post">
                            @csrf
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <button name="action" type="submit" class="primary-btn no-border" value="cart">ADD TO CART</button>
                            <button name="action" type="submit" class="heart-icon no-border" value="wishList"><span class="icon_heart_alt"></span></button>
                        </form>

{{--                        <a href="#" class="primary-btn">ADD TO CARD</a>--}}
{{--                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>--}}
                        <ul>
                            <li><b>Volume</b> <span>{{ $product->volume }}</span></li>
                            <li><b>Brand</b> <span>{{ $product->brand->name ?? null}}</span></li>
                            <li><b>Category</b> <span>{{ $product->brand->category->parent->name ?? null }}</span></li>
                            <li><b>Country</b> <span>{{ $product->country }}</span>
                            <li><b>Alcohol</b> <span>{{ $product->alcohol }}</span></li>
                            <li><b>Share On</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    @if($relatedProducts->count())
     <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ getImageUrl($product->image) }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{ route('product.shop.add', ['id' => encrypt($product->id), 'quantity' => 1, 'action'=> 'wishList']) }}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ route('product.shop.add', ['id' => encrypt($product->id), 'quantity' => 1, 'action'=> 'cart']) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>

                            <div class="product__discount__item__text">
                                <h5><a href="{{ route('product.show', ['id' => encrypt($product->id)]) }}">{{$product->name}}</a></h5>
                                @if($product->discount)
                                    <div class="product__item__price">{{ $product->discount_price }} <span>{{ $product->original_price }}</span></div>
                                    @else
                                    <div class="product__item__price">{{ $product->original_price }}</span></div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Related Product Section End -->

@endsection

@push('script')
    <script>
        $( document ).ready(function() {
            var message = @json(session()->get('message'));
            if(message) {
                toastr.success(message);
            }
        });
    </script>

@endpush



