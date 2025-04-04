@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Customers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Customers</a></li>
                            <li class="active">List Customers</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-12">
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissable fade show" role="alert" style="margin-top:10px;">
                {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-header">
                    <strong class="card-title">All Customers</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Number of Orders</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Date Joined</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        @foreach($customers as $customer)
                            <tbody>

                                <tr>
                                    <th scope="row">1</th>
                                    @php
                                        $customerId = $customer->id;
                                        $count = \App\Models\Order::where('customer_id', $customerId)
                                            ->where('order_status', 'Completed')
                                            ->where('payment_status', 'Paid')
                                            ->count();
                                    @endphp
                                    <td>{{ $count }}</td>
                                    <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                    <td> {{ \Carbon\Carbon::parse($customer->created_at)->format('D, j M Y')}}</td>
                                    <td>
                                        @if($customer->status == 'ACTIVE')
                                            <a class="updateCustomerStatus btn btn-success btn-sm" id="customer-{{ $customer->id }}" customer_id="{{ $customer->id }}" href="javascript:void(0)" data-status="ACTIVE">
                                                ACTIVE
                                            </a>
                                        @else 
                                            <a class="updateCustomerStatus btn btn-info btn-sm" id="customer-{{ $customer->id }}" customer_id="{{ $customer->id }}" href="javascript:void(0)" data-status="INACTIVE">
                                                INACTIVE
                                            </a>
                                        @endif
                                        {{-- <a href="{{ url('admin/add-edit-customer/'.$customer->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a> --}}

                                        <a href="javascript:void(0)" class="confirmDelete btn btn-danger btn-sm" record="customer" recordid="{{ $customer->id }}" type="button">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection