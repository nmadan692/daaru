@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.blog.blog.partials.form',
                        $data=[
                            'form-action' => 'admin.blog.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Blog',
                            'button-text' => 'Save',
                            'blog' => null
                        ]
            )
        </div>
    </div>
@endsection
