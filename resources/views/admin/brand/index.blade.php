@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Brand'" :table-id="'brand'"
                            :theads="[
                            'ID',
                            'Name',
                            'Category',
                            'Status',
                            'Action']"
                            :button="['route' => 'admin.brand.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/brand/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'category_name', name: 'category_name' },
                            { data: 'status', name: 'status' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
