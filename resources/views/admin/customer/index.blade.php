@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Customer'" :table-id="'user'"
                            :theads="[
                            'ID',
                            'Name',
                            'Town',
                            'Phone',
                            'Action']"

                            :url="'/admin/customer/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'full_name', name: 'full_name' },
                            { data: 'city', name: 'city' },
                            { data: 'phone', name: 'phone' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
