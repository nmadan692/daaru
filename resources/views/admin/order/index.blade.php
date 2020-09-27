@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Order'" :table-id="'order'"
                            :theads="[
                            'Invoice Number',
                            'Ordered Date',
                            // 'User Name',
                            // 'Phone Number',
                            'Product Name',
                            'Amount',
                            'Status',
                            'Payment Status',
                            'Action'
                            ]"
{{--                            :button="['route' => 'admin.product.create',--}}
{{--                                      'name' => 'Create',--}}
{{--                                      'icon' => 'la la-plus']"--}}
                            :url="'/admin/order/list'"
                            columns="[
{{--                            { data: 'id', name: 'id', searchable: false},--}}
                            { data: 'invoice_number', name: 'invoice_number', orderable: false},
                            { data: 'ordered_date', name: 'orders.created_at' },
{{--                            { data: 'full_name', name: 'users.first_name' },--}}
{{--                            { data: 'phone', name: 'users.phone' },--}}
                            { data: 'product_name', name: 'products.name' },
                            { data: 'amount', name: 'order_products.amount' },
                            { data: 'status', name: 'status', orderable: false, searchable: false  },
                            { data: 'payment_status', name: 'payment_status', orderable: false, searchable: false  },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
