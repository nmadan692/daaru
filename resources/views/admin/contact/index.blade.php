@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Contact'" :table-id="'contact'"
                            :theads="[
                            'ID',
                            'Name',
                            'Email',
                            'Message',
                            'Action']"

                            :url="'/admin/contact/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'email', name: 'email' },
                            { data: 'message', name: 'message' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
