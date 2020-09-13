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
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                            { data: 'full_name', name: 'full_name' },
                            { data: 'city', name: 'city' },
                            { data: 'phone', name: 'phone' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
