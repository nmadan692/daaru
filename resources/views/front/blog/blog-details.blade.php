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
                            <a href="{{ route('blog')}}">Blog</a>
                            <span>Blog-Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                @foreach($blogCategory  as $blogCategory)
                                    <li><a href="#">{{ $blogCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($recentBlog as $recentBlog)
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{$recentBlog->name}}</h6>
                                            <span>{{ $recentBlog->posted_date }}</span>
                                        </div>
                                    </a>
                                @endforeach()
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{ getImageUrl($blog->image) }}" alt="">
                        <h3>{{ $blog->name  }}</h3>
                        <p>{!! $blog->description !!}</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">


                                        <p> {{ $blog->created_at }}</p>
                                    <p><i class="fa fa-user-o"></i> Admin</p>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Category: </span> {{ $blog->blogCategory->name }}</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

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
