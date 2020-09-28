@extends('front.layouts.master')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('login')}}/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('login')}}/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('login')}}/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('login')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('login')}}/css/main.css">
@endpush
@section('content')
    <div class="container">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="background-color: #d5d5d5">
                    <form class="login100-form validate-form flex-sb flex-w" method="post" action="{{ route('customer.auth.login') }}">
                        @csrf
                        <span class="login100-form-title p-b-53">
						Sign In With
					</span>

                        {{--                            <a href="#" class="btn-face m-b-20">--}}
                        {{--                                <i class="fa fa-facebook-official"></i>--}}
                        {{--                                Facebook--}}
                        {{--                            </a>--}}

                        {{--                            <a href="#" class="btn-google m-b-20">--}}
                        {{--                                <img src="{{asset('login')}}/images/icons/icon-google.png" alt="GOOGLE">--}}
                        {{--                                Google--}}
                        {{--                            </a>--}}

                        <div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="email">
                            <span class="focus-input100"></span>
                        </div>
                        @if($errors->first('email'))
                            <span class="danger">{{ $errors->first('email') }}</span>
                        @endif

                        <div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

{{--                            <a href="#" class="txt2 bo1 m-l-5">--}}
{{--                                Forgot?--}}
{{--                            </a>--}}
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100"></span>
                        </div>
                        @if($errors->first('password'))
                            <span class="danger">{{ $errors->first('password') }}</span>
                        @endif

                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn" type="submit">
                                Sign In
                            </button>
                        </div>

                        <div class="w-full text-center p-t-55">
{{--						<span class="txt2">--}}
{{--							Not a member?--}}
{{--						</span>--}}

{{--                            <a href="#" class="txt2 bo1">--}}
{{--                                Sign up now--}}
{{--                            </a>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
@push('script')
    <script src="{{asset('login')}}/vendor/animsition/js/animsition.min.js"></script>
    <script src="{{asset('login')}}/vendor/select2/select2.min.js"></script>
    <script src="{{asset('login')}}/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{asset('login')}}/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="{{asset('login')}}/vendor/countdowntime/countdowntime.js"></script>
    <script src="{{asset('login')}}/js/main.js"></script>
@endpush
