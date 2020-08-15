@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.product.partials.form',
                    $data=[
                        'form-action' => 'admin.product.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Product',
                        'button-text' => 'Update',
                        'product' => $product
                    ]
        )
    </div>
@endsection
