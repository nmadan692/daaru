<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> {{ $setting->email }}</li>
                            <li><b>Delivery Hours : </b>{{ $setting->delivery_start_hour }} to {{ $setting->delivery_end_hour }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{ $setting->facebook }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $setting->twitter }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $setting->instagram }}"><i class="fa fa-instagram"></i></a>
                        </div>

                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ getImageUrl($setting->logo) }}" alt="Daaru Dot Com"></a>
                </div>
            </div>
            <div class="col-lg-6" style="text-align: center;">
                <nav class="header__menu">
                    <ul>
                        <li class="{{  request()->segment(1) == ''? 'active': ''   }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{  request()->segment(1) == 'products'? 'active': ''   }}"><a href="{{ route('products') }}">Products</a></li>
                        <li class="{{  request()->segment(1) == 'blog'? 'active': ''   }}"><a href="{{ route('blog') }}">Blog</a></li>
                        <li class="{{  request()->segment(1) == 'contact'? 'active': ''   }}"><a href="{{ route('contact.index') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
