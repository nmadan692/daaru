@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        @include('admin.cmspage.partials.form',
                    $data=[
                        'form-action' => 'admin.cms-page.update',
                        'form-method' => 'patch',
                        'form-title' => 'Edit Cms',
                        'button-text' => 'Update',
                        'cms_page' => $cms_page
                    ]
        )
    </div>
@endsection
