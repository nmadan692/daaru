@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.staff.partials.form',
                    $data=[
                        'form-action' => 'admin.staff.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Staff',
                        'button-text' => 'Update',
                        'user' => $user
                    ]
        )
    </div>
@endsection
