@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.staff.partials.form',
                        $data=[
                            'form-action' => 'admin.staff.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Staff',
                            'button-text' => 'Save',
                            'user' => null
                        ]
            )
        </div>
    </div>
@endsection
