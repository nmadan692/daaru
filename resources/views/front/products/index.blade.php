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
                            <span>Products</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">

                    <form action="" method="get" action="{{ route('products') }}" id="product-search-form">
                        @include('front.products.sidebar')
                        <input type="hidden" name="sortBy" id="hidden-sort-by" value="{{request('sortBy') ?? null}}">
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

@push('script')
    <script>
        function sortBy(el) {
            $('#hidden-sort-by').val($(el).val());
            $('#product-search-form').submit();
        }
    </script>
@endpush
