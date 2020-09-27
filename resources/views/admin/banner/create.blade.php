@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.banner.partials.form',
                        $data=[
                            'form-action' => 'admin.banner.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Banner Image',
                            'button-text' => 'Save',
                            'banner' => null
                        ]
            )
        </div>
    </div>
@endsection
