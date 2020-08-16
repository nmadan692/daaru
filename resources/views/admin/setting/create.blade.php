@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.setting.partials.form',
                        $data=[
                            'form-action' => 'admin.setting.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Setting',
                            'button-text' => 'Save',
                            'setting' => null
                        ]
            )
        </div>
    </div>
@endsection
