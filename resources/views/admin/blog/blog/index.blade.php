@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Blog'" :table-id="'blog'"
                            :theads="[
                            'ID',
                            'Image',
                            'Title',
                            'News',
                            'Status',
                            'Category',
                            'Action']"
                            :button="['route' => 'admin.blog.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/blog/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'image', name: 'image' },
                            { data: 'name', name: 'name' },
                            { data: 'description', name: 'description' },
                            { data: 'status', name: 'status' },
                            { data: 'blog_category_name', name: 'blog_category_name' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
