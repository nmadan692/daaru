@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.product.partials.form',
                        $data=[
                            'form-action' => 'admin.product.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Product',
                            'button-text' => 'Save',
                            'product' => null
                        ]
            )
        </div>
    </div>
@endsection
