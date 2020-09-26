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
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                                    <li><a href="{{ route('blog', ['id' => encrypt($blogCategory->id)]) }}">{{ $blogCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>


                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($recentBlog as $recentBlog)
                                    <a href="{{ route('blog.details', ['id' => encrypt($recentBlog->id)]) }}" class="blog__sidebar__recent__item">
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


                <div class="col-lg-8 col-md-7">
                    <div class="row">

                        @forelse($blog as $blog)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ getImageUrl($blog->image) }}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{ $blogCategory->created_at }}</li>
                                        <li><i class="fa fa-user-o"></i> Admin</li>
                                    </ul>
                                    <h5><a href="{{ route('blog.details', encrypt($blog->id) )  }}">{{$blog->name}}</a></h5>
                                    <p>{!! strip_tags(Str::limit($blog->description,100)) !!}</p>
                                    <a href="{{ route('blog.details', encrypt($blog->id) )  }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                            @empty
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">

                                        <p>No recent blogs are available.</p>

                                </div>
                            </div>

                        @endforelse



                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection

@push('script')
    <script>
        $( document ).ready(function() {
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
