@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.blog.blog.partials.form',
                    $data=[
                        'form-action' => 'admin.blog.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Blog',
                        'button-text' => 'Update',
                        'blog' => $blog
                    ]
        )
    </div>
@endsection
