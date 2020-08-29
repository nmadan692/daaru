<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="{{ getImageUrl($setting[0]->logo ?? null) }}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: {{ $setting[0]->address ?? null }}</li>
                        <li>Phone: {{ $setting[0]->phone ?? null}}</li>
                        <li>Viber: {{ $setting[0]->viber ?? null}}</li>
                        <li>Email: {{ $setting[0]->email ?? null}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h4><b>Useful Links</b></h4><br>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h4><b>Join Our Social Links</b></h4><br>

                    <div class="footer__widget__social">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDaaruu.comBiratnagar&tabs&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                width="340" height="200" style="border:none;overflow:hidden"
                                scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
{{--                        <a href="{{ $setting[0]->facebook ?? null }}"><i class="fa fa-facebook"></i></a>--}}
{{--                        <a href="{{ $setting[0]->instagram ?? null}}"><i class="fa fa-instagram"></i></a>--}}
{{--                        <a href="{{ $setting[0]->twitter ?? null}}"><i class="fa fa-twitter"></i></a>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
                        {{ $setting[0]->name ?? null}} </div>
                    <div class="footer__copyright__payment">
                        Designed  by <a href="https://softmine.com.np" target="_blank">SoftMine Technologies</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
