@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Order'" :table-id="'order'"
                            :theads="[
                            'ID',
                            'User Name',
                            'Phone Number',
                            'Product Name',
                            'Amount',
                            'Quantity',
                            'Phone',
                            // 'Status',
                            // 'Action'
                            ]"
{{--                            :button="['route' => 'admin.product.create',--}}
{{--                                      'name' => 'Create',--}}
{{--                                      'icon' => 'la la-plus']"--}}
                            :url="'/admin/order/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'full_name', name: 'full_name' },
                            { data: 'phone', name: 'phone' },
                            { data: 'product_name', name: 'product_name' },
                            { data: 'amount', name: 'amount' },
                            { data: 'quantity', name: 'quantity' },
                            { data: 'id', name: 'id' },
{{--                            { data: 'action', name: 'action', orderable: false, searchable: false }--}}
                            ]">
        </x-tables.datatable>
    </div>
@endsection
