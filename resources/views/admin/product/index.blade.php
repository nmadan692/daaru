@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Product'" :table-id="'product'"
                            :theads="[
                            'ID',
                            'Image',
                            'Name',
                            'Brand Name',
                            'Volume',
                            'Description',
                            'Price',
                            'Quantity',
                            'status',
                            'Action']"
                            :button="['route' => 'admin.product.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/product/list'"
                            columns="[
                            { data: 'id', name: 'id' },
                            { data: 'image', name: 'image' },
                            { data: 'name', name: 'name' },
                            { data: 'brand_name', name: 'brand_name' },
                            { data: 'volume', name: 'volume' },
                            { data: 'description', name: 'description' },
                            { data: 'price', name: 'price' },
                            { data: 'quantity', name: 'quantity' },
                            { data: 'status', name: 'status' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }
                            ]">
        </x-tables.datatable>
    </div>
@endsection
