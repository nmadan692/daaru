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
                            <span>My Wish List</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <my-wish-list :products="{{ json_encode($products) ?? null }}"></my-wish-list>
    </section>
    <!-- Shoping Cart Section End -->

@endsection
