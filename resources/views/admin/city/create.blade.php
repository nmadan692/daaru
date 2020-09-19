@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.city.partials.form',
                        $data=[
                            'form-action' => 'admin.city.store',
                            'form-method' => 'post',
                            'form-title' => 'Create City',
                            'button-text' => 'Save',
                            'city' => null
                        ]
            )
        </div>
    </div>
@endsection
