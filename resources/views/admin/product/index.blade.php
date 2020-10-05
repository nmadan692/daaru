@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Product'" :table-id="'product'"
                            :theads="[
                            'ID',
                            'Name',
                            'Brand Name',
                            'In Stock',
                            'Quantity',
                            'Status',
                            'Action'
                            ]"
                            :button="['route' => 'admin.product.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/product/list'"
                            columns="[
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                            { data: 'name', name: 'name' },
                            { data: 'brand_name', name: 'brands.name' },
                            { data: 'in_stock', name: 'in_stock', searchable: false, orderable: false, },
                            { data: 'quantity', name: 'quantity'},
                            { data: 'status', name: 'status', searchable: false, orderable: false, },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
