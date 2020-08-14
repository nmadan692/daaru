@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.category.partials.form',
                        $data=[
                            'form-action' => 'admin.category.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Category',
                            'button-text' => 'Save',
                            'category' => null
                        ]
            )
        </div>
    </div>
@endsection
