@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.banner.partials.form',
                    $data=[
                        'form-action' => 'admin.banner.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Banner Image',
                        'button-text' => 'Update',
                        'banner' => $banner
                    ]
        )
    </div>
@endsection
