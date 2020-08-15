@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.brand.partials.form',
                    $data=[
                        'form-action' => 'admin.brand.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Brand',
                        'button-text' => 'Update',
                        'brand' => $brand
                    ]
        )
    </div>
@endsection
