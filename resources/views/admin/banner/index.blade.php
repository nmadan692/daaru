@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Banner Image'" :table-id="'banner'"
                            :theads="[
                            'ID',
                            'Image',
                            'Status',
                            'Action']"
                            :button="['route' => 'admin.banner.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/banner/list'"
                            columns="[
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                            { data: 'image', name: 'image' },
                            { data: 'status', name: 'status' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
