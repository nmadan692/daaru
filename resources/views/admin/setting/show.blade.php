@extends('admin.layouts.master')

@section('content')

    <div class="col-xl-12 col-lg-12" style="margin-top: 1%">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs   m-portlet--unair">

            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">

                            <div class="form-group m-form__group row">
                                <div class="col-12 ml-auto" style="text-align: center;">
                                    <h3 class="m-form__section">General Information</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->name }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Address</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->address }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Phone</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->phone }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Viber</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->viber }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->email }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Delivery Starts at</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->delivery_start_hour }}" readonly>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Delivery Ends at</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->delivery_end_hour }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Facebook</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->facebook }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Instagram</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->instagram }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Twitter</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $setting->twitter }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Logo</label>
                                <div class="col-4">
                                    <img src="{{ getImageUrl($setting->logo) }}" alt="" width="350px" height="110px">
                                </div>
                            </div>



                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
