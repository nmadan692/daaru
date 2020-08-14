@extends('admin.layouts.master')
@section('content')
    <div class="m-content">
        <x-tables.datatable :title="'Accountant'" :table-id="'accountant'" :theads="['First Name', 'Last Name','Phone Number', 'Email', 'Address','Salary', 'Action']"  columns="[{ data: 'first_name', name: 'users.first_name' }, { data: 'last_name', name: 'users.last_name' },{ data: 'phone', name: 'user_details.phone' }, { data: 'email', name: 'users.email' }, { data: 'address', name: 'user_details.address' }, { data: 'salary', name: 'salary' }, { data: 'action', name: 'action', orderable: false, searchable: false }]">
        </x-tables.datatable>
    </div>
@endsection




