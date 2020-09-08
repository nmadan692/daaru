@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Product'" :table-id="'product'"
                            :theads="[
                            'ID',
                            'Company Name',
                            'Phone',
                            'Email',
                            'Address',
                            'Action']"

                            :button="['route' => 'admin.setting.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"

                            :url="'/admin/setting/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'phone', name: 'phone' },
                            { data: 'email', name: 'email' },
                            { data: 'address', name: 'address' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
