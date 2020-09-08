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
                                    <h3 class="m-form__section">Product</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $product->name }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Volume</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $product->volume }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Country</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $product->country }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Alcohol</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $product->alcohol }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Price</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $product->price }}" readonly>
                                </div>
                                <label for="example-text-input" class="col-2 col-form-label">Discount</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $product->discount }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Quantity</label>
                                <div class="col-4">
                                    <input class="form-control m-input" type="text" value="{{ $product->quantity }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Image</label>
                                <div class="col-4">
                                    <img src="{{ getImageUrl($product->image) }}" alt="" width="200px" height="200px">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Details</label>
                                <div class="col-4">
                                    <p>{!! strip_tags($product->description) !!}</p>
                                </div>
                            </div>div


                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
