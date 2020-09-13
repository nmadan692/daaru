@extends('admin.layouts.master')

@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Cms Page'" :table-id="'cms_pages'"
                            :theads="[
                            'ID',
                            'Terms & Conditions',
                            'Return Policy',
                            'Action']"
                            :button="['route' => 'admin.cms-page.create',
                                      'name' => 'Create',
                                      'icon' => 'la la-plus']"
                            :url="'/admin/cms-page/list'"
                            columns="[
                            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                            { data: 'terms_and_conditions', name: 'terms_and_conditions' },
                            { data: 'return_policy', name: 'return_policy' },
                            { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection
