@extends('front.layouts.master')

@section('content')
    @push('style')
        <style>
            .mySlides {display: none;}
            img {vertical-align: middle;}

            /* Slideshow container */
            .slideshow-container {
                max-width: 1000px;
                position: relative;
                margin: auto;
            }

            /* Caption text */
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active {
                background-color: #717171;
            }

            /* Fading animation */
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 1.5s;
                animation-name: fade;
                animation-duration: 1.5s;
            }

            @-webkit-keyframes fade {
                from {opacity: .4}
                to {opacity: 1}
            }

            @keyframes fade {
                from {opacity: .4}
                to {opacity: 1}
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
                .text {font-size: 11px}
            }
        </style>
    @endpush


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


                    <div class="slideshow-container">

                        <div class="mySlides fade hero__item set-bg">
                            <div class="numbertext">1 / 3</div>
                            <img src="{{ getImageUrl($cms_page[0]->image) }}" style="width:100%">
                            <div class="text">Caption Text</div>
                        </div>

                        <div class="mySlides fade hero__item set-bg">
                            <div class="numbertext">2 / 3</div>
                            <img src="{{ getImageUrl($cms_page[0]->image) }}" style="width:100%">
                            <div class="text">Caption Two</div>
                        </div>

                        <div class="mySlides fade hero__item set-bg">
                            <div class="numbertext">3 / 3</div>
                            <img src="{{ getImageUrl($cms_page[0]->image) }}" style="width:100%">
                            <div class="text">Caption Three</div>
                        </div>

                    </div>
                    <br>

                    <div style="text-align:center">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
{{--                    <div class="hero__item set-bg" data-setbg="{{ getImageUrl($cms_page[0]->image) }}">--}}
{{--                        <div class="hero__text">--}}
{{--                            <span>Red Wine</span>--}}

{{--                            <h2>Buy Liquor<br />Online in Nepal </h2>--}}
{{--                            <p>Free Delivery Available</p>--}}

{{--                            <a href="#" class="primary-btn">SHOP NOW</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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


    @push('script')

        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 3000); // Change image every 3 seconds
            }
        </script>
    @endpush
@endsection
