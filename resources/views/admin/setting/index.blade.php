@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Setting'" :table-id="'setting'"
                            :theads="[
                            'ID',
                            'Company Name',
                            'Phone',
                            'Email',
                            'Action']"
                            :button="['route' => 'admin.setting.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/setting/list'"
                            columns="[
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                            { data: 'name', name: 'name' },
                            { data: 'phone', name: 'phone' },
                            { data: 'email', name: 'email' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
