@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.city.partials.form',
                    $data=[
                        'form-action' => 'admin.city.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit City',
                        'button-text' => 'Update',
                        'city' => $city
                    ]
        )
    </div>
@endsection
