@extends('front.layouts.master')
@section('content')
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <form action="" method="get" action="{{ route('products') }}">
                        @include('front.products.sidebar')
                        <button type="submit" class="site-btn">Filter</button>
                    </form>
                </div>
                <div class="col-lg-9 col-md-7">
                    @include('front.products.products')
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
