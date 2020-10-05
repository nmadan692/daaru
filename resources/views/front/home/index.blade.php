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
                                <li>
                                    <a href="{{ route('products', ['categories' => [$category->id]]) }}">{{ $category->name }}</a>
                                </li>
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

                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($banners as $key => $banner)
                                <div class="carousel-item {{ $key == 0 ? 'active' : null }}">
                                    <img class="d-block w-100" src="{{ getImageUrl($banner->image ?? null) }}"
                                         alt="First slide">
                                </div>
                            @endforeach

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
                                <div class="categories__item set-bg"
                                     data-setbg="{{ getResizedImage($latestProduct->image, \App\Daaruu\Constants\ImageSizeConstant::PRODUCT_270_270) }}">
                                    <h5>
                                        <a href="{{ route('product.show', ['id' => encrypt($latestProduct->id)]) }}">{{$latestProduct->name}}</a>
                                    </h5>
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
                            <div class="featured__item__pic set-bg"
                                 data-setbg="{{ getResizedImage($product->image, \App\Daaruu\Constants\ImageSizeConstant::PRODUCT_270_270) }}">
                                <ul class="featured__item__pic__hover">
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

                                <h5>
                                    <a href="{{ route('product.show', ['id' => encrypt($product->id)]) }}">{{$product->name}}</a>
                                </h5>
                                @if($product->discount)
                                    <div class="product__item__price">{{ $product->discount_price }}
                                        <span>{{ $product->original_price }}</span></div>
                                @else
                                    <div class="product__item__price"><span>{{ $product->original_price }}</span></div>
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

                                <h5>
                                    <a href="{{ route('blog.details', encrypt($recentBlog->id) )  }}">{{$recentBlog->name}}</a>
                                </h5>
                                <p>{!! strip_tags(Str::limit($recentBlog->description,100)) !!}</p>
                                <a href="{{ route('blog.details', encrypt($recentBlog->id) )  }}" class="blog__btn">READ
                                    MORE <span class="arrow_right"></span></a>
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
@endsection
