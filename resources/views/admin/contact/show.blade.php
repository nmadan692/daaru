@extends('admin.layouts.master')

@section('content')

    <div class="col-xl-12 col-lg-12" style="margin-top: 1%">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs   m-portlet--unair">

            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">

                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">Contact</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $contact->name }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $contact->email }}" readonly>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Message</label>
                                <div class="col-4">
                                    <p>{{ $contact->message }}</p>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
