@extends('front.layouts.master')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categories</span>
                        </div>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{ route('products', ['categories' => [$category->id]]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('products')}}">
                                <input type="text" name="search" placeholder="What do you need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{$setting[0]->phone ?? null}}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset('front')}}/img/hero/bannner.jpg">
                        <div class="hero__text">
                            <span>Red Wine</span>

                            <h2>Buy Liquor<br />Online in Nepal </h2>
                            <p>Free Delivery Available</p>

                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest Product</h2>
                    </div>
                    <div class="categories__slider owl-carousel">


                        @foreach($latestProducts as $latestProduct)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ getImageUrl($latestProduct->image) }}">
                                <h5><a href="{{ route('product.show', ['id' => encrypt($latestProduct->id)]) }}">{{$latestProduct->name}}</a></h5>
                            </div>
                        </div>
                        @endforeach()

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>

                </div>
            </div>
            <div class="row featured__filter">

                @foreach($featuredProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ getImageUrl($product->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('product.show', ['id' => encrypt($product->id)]) }}">{{$product->name}}</a></h6>
                            <h5>{{$product->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($recentBlogs as $recentBlog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ getImageUrl($recentBlog->image) }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{ $recentBlog->created_at }}</li>
                                <li><i class="fa fa-user-o"></i> Admin</li>
                            </ul>

                            <h5><a href="{{ route('blog.details', encrypt($recentBlog->id) )  }}">{{$recentBlog->name}}</a></h5>
                            <p>{!! strip_tags(Str::limit($recentBlog->description,100)) !!}</p>
                            <a href="{{ route('blog.details', encrypt($recentBlog->id) )  }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="blog__item">
                            <p style="text-align: center;">No recent blogs are available.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
