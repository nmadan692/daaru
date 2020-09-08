@extends('front.layouts.master')
@section('content')
    @push('style')
        <style>
       .container{
           margin-top: 1%;
           margin-bottom: 1%;
            }
        /* Style the tab */
        .tab {
        overflow: hidden;
        background-color:#f28e1c;
        }

        /* Style the buttons inside the tab */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ffcc00;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #ffcc00;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #f28e1c;
        border-top: none;
        }
        </style>
    @endpush

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('front')}}/img/daaruu.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Daaruu Dot Com</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home')}}">Home</a>

                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="container">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Dharan</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Biratnagar</button>
    </div>

    <div id="London" class="tabcontent">
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>{{ $setting[0]->phone ?? null}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>{{ $setting[0]->address ?? null}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>{{ $setting[0]->delivery_start_hour ?? null}} to {{ $setting[0]->delivery_start_hour ?? null}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>{{ $setting[0]->email ?? null }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    </div>

    <div id="Paris" class="tabcontent">
        <!-- Contact Section Begin -->
        <section class="contact spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_phone"></span>
                            <h4>Phone Biratnagar</h4>
                            <p>{{ $setting[0]->phone ?? null}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_pin_alt"></span>
                            <h4>Address Biratnagar</h4>
                            <p>{{ $setting[0]->address ?? null}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_clock_alt"></span>
                            <h4>Open time Biratnagar</h4>
                            <p>{{ $setting[0]->delivery_start_hour ?? null}} to {{ $setting[0]->delivery_start_hour ?? null }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_mail_alt"></span>
                            <h4>Email Biratnagar</h4>
                            <p>{{ $setting[0]->email ?? null}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section End -->
    </div>
    </div>

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>New York</h4>
                <ul>
                    <li>Phone: +12-345-6789</li>
                    <li>Add: 16 Creek Ave. Farmingdale, NY</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="row contact-custom">
                    <div class="col-lg-6">
                        <input type="text" name="name" placeholder="Your name" class="{{ $errors->first('name') ? 'has-error' : ''}}">
                        @if($errors->first('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="email" placeholder="Your Email" class="{{ $errors->first('email') ? 'has-error' : ''}}">
                        @if($errors->first('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row contact-custom">
                    <div class="col-lg-12 text-center">
                            <textarea placeholder="Your message" name="message" class="{{ $errors->first('message') ? 'has-error' : ''}}"></textarea>
                            @if($errors->first('message'))
                                <span class="error">{{ $errors->first('message') }}</span>
                            @endif
                            <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
    @push('script')

        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    @endpush
@endsection
