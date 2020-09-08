@extends('front.layouts.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('front')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code--}}
{{--                    </h6>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <div class="row">
                        @include('front.checkout.billing-detail')
                        @include('front.checkout.order')
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
