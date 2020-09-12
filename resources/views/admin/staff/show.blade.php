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
                                    <h3 class="m-form__section">Staff</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $staff->full_name }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Address</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $staff->address }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Phone</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $staff->phone }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $staff->email }}" readonly>
                                </div>
                            </div>



                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
