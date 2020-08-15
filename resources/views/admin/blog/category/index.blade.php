@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Categoty'" :table-id="'category'"
                            :theads="[
                            'ID',
                            'Name',
                            'Status',
                            'Action']"
                            :button="['route' => 'admin.blog.category.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/blog/category/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'status', name: 'status' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
