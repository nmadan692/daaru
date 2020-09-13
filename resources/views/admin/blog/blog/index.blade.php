@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Blog'" :table-id="'blog'"
                            :theads="[
                            'ID',
                            'Category',
                            'Title',
                            'Status',
                            'Action']"
                            :button="['route' => 'admin.blog.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/blog/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'blog_category_name', name: 'blog_categories.name' },
                            { data: 'name', name: 'name' },
                            { data: 'status', name: 'status' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>

@endsection
