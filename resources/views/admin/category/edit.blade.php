@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.category.partials.form',
                    $data=[
                        'form-action' => 'admin.category.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Category',
                        'button-text' => 'Update',
                        'category' => $category
                    ]
        )
    </div>
@endsection
