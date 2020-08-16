@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.setting.partials.form',
                    $data=[
                        'form-action' => 'admin.setting.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Setting',
                        'button-text' => 'Update',
                        'setting' => $setting
                    ]
        )
    </div>
@endsection
