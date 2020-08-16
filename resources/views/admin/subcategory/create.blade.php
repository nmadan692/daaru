@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.subcategory.partials.form',
                        $data=[
                            'form-action' => 'admin.subcategory.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Sub Category',
                            'button-text' => 'Save',
                            'subcategory' => null
                        ]
            )
        </div>
    </div>
@endsection
