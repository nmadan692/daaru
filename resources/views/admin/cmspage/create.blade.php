@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <div class="m-content">
            @include('admin.cmspage.partials.form',
                        $data=[
                            'form-action' => 'admin.cms-page.store',
                            'form-method' => 'post',
                            'form-title' => 'Create Cms',
                            'button-text' => 'Save',
                            'cms_page' => null
                        ]
            )
        </div>
    </div>
@endsection
