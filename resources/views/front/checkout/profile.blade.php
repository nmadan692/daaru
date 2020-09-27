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
                            <a href="#">Customer</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <section class="checkout spad">
        <div class="container">

                <form method="post">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                        </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="checkout__order">
                                        <h4>Profile Detail</h4>
                                        <ul><li>Name <span>Madan Neupane</span></li></ul>
                                        <ul><li>Street Address <span>Letang</span></li></ul>
                                        <ul><li>Apartment <span>Turke</span></li></ul>
                                        <ul><li>Phone <span>9842354941</span></li></ul>
                                        <ul><li>Email <span>nmadan692@gmail.com</span></li></ul>

                                        <button type="submit" class="site-btn">Edit Profile</button>
                                    </div>
                                </div>

                        <div class="col-lg-3 col-md-6">
                        </div>



                    </div>
                </form>

        </div>
    </section>

@endsection





