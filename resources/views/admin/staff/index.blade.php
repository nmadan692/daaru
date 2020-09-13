@extends('admin.layouts.master')

@section('content')
<div class="m-content">
    <x-tables.datatable :title="'Staff'" :table-id="'staff'"
                        :theads="[
                            'ID',
                            'Name',
                            'Phone',
                            'Email',
                            'Action'
                            ]"
                        :button="['route' => 'admin.staff.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                        :url="'/admin/staff/list'"
                        columns="[
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                            { data: 'full_name', name: 'full_name' },
                            { data: 'phone', name: 'phone' },
                            { data: 'email', name: 'email' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
    </x-tables.datatable>
</div>
@endsection
