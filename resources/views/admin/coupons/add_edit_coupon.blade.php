@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Coupon</a></li>
                            <li class="active">Add Coupon</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-6 col-xxl-6 col-md-5">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>
                            @endif
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissable fade show" role="alert" style="margin-top:10px;">
                                {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            @endif
                            <form id="CouponForm" @if(empty($coupon->id)) action="{{ url('admin/add-edit-coupon') }}" @else action="{{ url('admin/add-edit-coupon/'.$coupon->id) }}" @endif method="post" novalidate="novalidate">
                                @csrf

                                <div class="form-group text-center">
                                </div>
                                @if(empty($coupon->coupon_code))
                                    <label for="coupon_code" class="control-label mb-1"><strong>Coupon Code</strong></label>
                                    <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15)?>">
                                @else 
                                    <label for="coupon_code" class="control-label mb-1"><strong>Coupon Code</strong></label>
                                    <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter coupon code" @if(!empty($coupon->coupon_code)) value="{{ $coupon->coupon_code }}" @else value="{{ old('coupon_code') }}" @endif>
                                @endif
                                <div class="form-group">
                                    <label for="coupon_type" class="control-label mb-1"><strong>Coupon Type</strong></label><br>
                                    <span><input type="radio" name="coupon_type" value="Percentage" @if(isset($coupon['coupon_type']) && $coupon['coupon_type']== "Percentage") checked @elseif(!isset($coupon['coupon_type'])) checked="" @endif>&nbsp;Percentage&nbsp;&nbsp; (in %)</span>
                                    <span><input type="radio" name="coupon_type"  value="Fixed" @if(isset($coupon['coupon_type']) && $coupon['coupon_type']== "Fixed") checked="" @endif>&nbsp; Fixed &nbsp; (in USD) &nbsp;&nbsp;</span>
                                </div>
                                
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1"><strong>Coupon Description</strong></label>
                                    <div class="row form-group">
                                        <div class="col-12"><textarea name="description" id="description" rows="3" placeholder="e.g New Year Sales 15% off" class="form-control">@if(!empty($coupon->description)){{$coupon->description}}@else{{old('description')}}@endif</textarea></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="coupon_amount" class="control-label mb-1"><strong>Coupon Amount</strong></label>
                                    <input id="coupon_amount" name="coupon_amount" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Coupon Amount" @if(!empty($coupon->coupon_amount)) value="{{ $coupon->coupon_amount }}" @else value="{{ old('coupon_amount') }}" @endif>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="coupon_amount" class="control-label mb-1">
                                                <strong>Select Category</strong>
                                            </label>
                                            <select data-placeholder="Choose a category..." multiple class="standardSelect" name="categories[]">
                                                @foreach ($categories as $category)
                                                    <option value="" label="default"></option>
                                                    <option value="{{ $category['id'] }}" @if(in_array($category['id'], $selCats)) selected="" @endif>{{ $category['category_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="coupon_amount" class="control-label mb-1" name="products[]">
                                                <strong>Select Product</strong>
                                            </label>
                                            <select data-placeholder="Choose a product..." multiple class="standardSelect" name="products[]">
                                                <option value="" label="default"></option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product['id']}}" @if(in_array($product['id'], $selPros)) selected="" @endif>{{ $product['product_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="coupon_amount" class="control-label mb-1" name="users[]">
                                                <strong>Select Users</strong>
                                            </label>
                                            <select data-placeholder="Choose a users..." multiple class="standardSelect" name="users[]">
                                                <option value="" label="default"></option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user['email'] }}" @if(in_array($user['email'], $selUsers)) selected="" @endif>{{ $user['first_name'] }} {{ $user['last_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="coupon_amount" class="control-label mb-1">
                                                <strong>Start Date</strong>
                                            </label>
                                            <input type="date" class="form-control" name="valid_from" id="start_date" placeholder="Enter Start Date" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask @if(isset($coupon['valid_from'])) value="{{ $coupon['valid_from'] }}" @endif required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="valid_to" class="control-label mb-1">
                                                <strong>End Date</strong>
                                            </label>
                                            <input type="date" class="form-control" name="valid_to" id="valid_to" placeholder="Enter End Date" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask @if(isset($coupon['valid_to'])) value="{{ $coupon['valid_to'] }}" @endif required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <button id="create-coupon" type="submit" class="btn btn-lg btn-info btn-block">
                                        @if(empty($coupon->id))
                                            <span id="create-coupon">Create Coupon</span>
                                        @else 
                                            <span id="create-coupon">Edit Coupon</span>
                                        @endif
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div><!--/.col-->
    </div>
</div>
@endsection