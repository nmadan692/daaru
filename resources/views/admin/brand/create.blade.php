@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.brand.partials.form',
                        $data=[
                            'form-action' => 'admin.brand.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Brand',
                            'button-text' => 'Save',
                            'brand' => null
                        ]
            )
        </div>
    </div>
@endsection
