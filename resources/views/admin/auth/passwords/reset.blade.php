@extends('admin.auth.layouts.master')

@section('content')
    <div class="m-login__signin">
        <div class="m-login__head">
            <h3 class="m-login__title">Reset Your Password</h3>
        </div>
        <form class="m-login__form m-form" method="post" action="{{ route('admin.auth.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
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
            <div class="form-group m-form__group {{ $errors->first('password_confirmation') ? 'has-danger' : null }}">
                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="password_confirmation">
                @if($errors->first('password_confirmation'))
                    <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>
            <div class="m-login__form-action">
                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Reset</button>
            </div>
        </form>
    </div>
@endsection
