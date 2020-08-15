@extends('admin.auth.layouts.master')

@section('content')
    <div class="m-login__forget-password">
        <div class="m-login__head">
            <h3 class="m-login__title">Forgotten Password ?</h3>
            <div class="m-login__desc">Enter your email to reset your password:</div>
        </div>
        <form class="m-login__form m-form" method="post" action=" {{ route('admin.auth.password.email') }}">
            @csrf
            @include('flash::message')
            <div class="form-group m-form__group {{ $errors->first('email') ? 'has-danger' : null }}">
                <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                @if($errors->first('email'))
                    <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="m-login__form-action">
                <button type="submit"  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Request</button>
                <a href="{{ route('admin.auth.login') }}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">Cancel</a>
            </div>
        </form>
    </div>
@endsection
