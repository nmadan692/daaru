@extends('front.layouts.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('front')}}/img/daaruu.jpg">
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
                @include('front.checkout.billing-detail')
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection


@push('script')
    <script>
        $( document ).ready(function() {
            var message = @json(session()->get('message'));
            var status = @json(session()->get('status')) ?? 'success';
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
