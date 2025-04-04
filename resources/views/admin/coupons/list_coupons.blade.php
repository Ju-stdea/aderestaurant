@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Coupons</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Coupons</a></li>
                            <li class="active">List Coupons</li>
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
                    <strong class="card-title">All Coupons</strong>
                    <a href="{{ url('admin/add-edit-coupon') }}" style="max-width: 150px; float:right;" class="btn btn-block btn-success"> Add Coupon</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Code</th>
                                <th scope="col">Coupon Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        @foreach($coupons as $coupon)
                            <tbody>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $coupon->coupon_code }}</td>
                                    <td>{{ $coupon->coupon_type }}</td>
                                    <td>{{ $coupon->coupon_amount }}</td>
                                    <td> {{ \Carbon\Carbon::parse($coupon->valid_from)->format('D, j M Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($coupon->valid_to)->format('D, j M Y')}}</td>
                                    <td>
                                        @if($coupon->status == 'ACTIVE')
                                            <a class="updateCouponStatus btn btn-success btn-sm" id="coupon-{{ $coupon->id }}" coupon_id="{{ $coupon->id }}" href="javascript:void(0)" data-status="ACTIVE">
                                                ACTIVE
                                            </a>
                                        @else 
                                            <a class="updateCouponStatus btn btn-info btn-sm" id="coupon-{{ $coupon->id }}" coupon_id="{{ $coupon->id }}" href="javascript:void(0)" data-status="INACTIVE">
                                                INACTIVE
                                            </a>
                                        @endif
                                        <a href="{{ url('admin/add-edit-coupon/'.$coupon->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>

                                        <a href="javascript:void(0)" class="confirmDelete btn btn-danger btn-sm" record="coupon" recordid="{{ $coupon->id }}" type="button">Delete</a>
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