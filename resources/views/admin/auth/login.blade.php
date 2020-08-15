@extends('admin.auth.layouts.master')

@section('content')
    <div class="m-login__signin">
            <div class="m-login__head">
                <h3 class="m-login__title">Sign In To Admin</h3>
            </div>
            <form class="m-login__form m-form" method="post" action="{{ route('admin.auth.login') }}">
                @csrf
                <div class="form-group m-form__group {{ $errors->first('email') ? 'has-danger' : null }}">
                    <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
                    @if($errors->first('email'))
                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group m-form__group {{ $errors->first('password') ? 'has-danger' : null }}">
                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                    @if($errors->first('password'))
                        <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="row m-login__form-sub">
                    <div class="col m--align-left">
                        <label class="m-checkbox m-checkbox--focus">
                            <input type="checkbox" name="remember"> Remember me
                            <span></span>
                        </label>
                    </div>
                    <div class="col m--align-right">
                        <a href="{{ route('admin.auth.password.request') }}" class="m-link">Forget Password ?</a>
                    </div>
                </div>
                <div class="m-login__form-action">
                    <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign In</button>
                </div>
            </form>
        </div>
@endsection
