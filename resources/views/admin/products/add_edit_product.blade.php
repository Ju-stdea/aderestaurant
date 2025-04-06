@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        {{-- <h1>{{ $title }}</h1> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Product</a></li>
                            <li class="active">Add Product</li>
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
            <form action="#" method="post" class="form-horizontal" @if(empty($productdata->id)) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/'.$productdata->id) }}" @endif method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Product</strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="product_name" class="control-label mb-1"><strong>Product Name</strong></label>
                                            <input id="product_name" @if(!empty($productdata->product_name)) value="{{ $productdata->product_name }}" @else value="{{ old('product_name') }}" @endif name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter product name" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name" class="control-label mb-1"><strong>Category Name</strong></label>
                                            <select id="select" class="form-control" name="category_id" required>
                                                <option value="">Please select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category['id'] }}" @if(!empty($productdata->category_id) && $productdata->category_id== $category['id']) selected ="" @endif>{{ $category['category_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_price" class="control-label mb-1"><strong>Product Price (₦)</strong></label>
                                            <input id="product_price" @if(!empty($productdata->product_price)) value="{{ $productdata->product_price }}" @else value="{{ old('product_price') }}" @endif name="product_price" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter product price" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_discount" class="control-label mb-1"><strong>Product Discount (%)</strong></label>
                                            <input id="product_discount" @if(!empty($productdata->product_discount)) value="{{ $productdata->product_discount }}" @else value="{{ old('product_discount') }}" @endif name="product_discount" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter product discount">
                                        </div>

                                        <div class="form-group">
                                            <label for="product_stock" class="control-label mb-1"><strong>Product Stock</strong></label>
                                            <input id="stock" @if(!empty($productdata->stock)) value="{{ $productdata->stock }}" @else value="{{ old('stock') }}" @endif name="stock" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter product stock" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_weight" class="control-label mb-1"><strong>Product Weight (LB)</strong></label>
                                            <input id="product_weight" @if(!empty($productdata->product_weight)) value="{{ $productdata->product_weight }}" @else value="{{ old('product_weight') }}" @endif name="product_weight" type="number" min="0.01" step="0.01" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter product weight greater than (0.01)" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_code" class="control-label mb-1"><strong>Product Code</strong></label>
                                            <input id="product_code" @if(!empty($productdata->product_code)) value="{{ $productdata->product_code }}" @else value="{{ old('product_code') }}" @endif name="product_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter product code">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    {{-- <img style="width:120px; margin-top: 5px;" src="{{ $productdata->main_image}}" alt="">
                                                   --}}
                                                    <label for="product_image" class="control-label mb-1"><strong>Product Image</strong></label>
                                                    <input type="file"  name="main_image" id="file-input" name="product_image" class="form-control-file">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="product_video" class="control-label mb-1"><strong>Product Video</strong></label>
                                                <input type="file" id="file-input" name="product_video" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1"><strong>Product Description</strong></label>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <textarea name="product_description" id="description" rows="9" placeholder="Product description....." class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="featured_item"><strong>Flash Sales</strong></label>
                                            <input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($productdata['is_featured']) && $productdata['is_featured']== "Yes") checked ="" @endif>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                {{-- <span id="payment-button-amount">Create Product</span> --}}
                                                @if(empty($productdata->id))
                                                    <span id="create-product">Create Product</span>
                                                @else 
                                                    <span id="create-product">Edit Product</span>
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Other Details</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="meta-title" class=" form-control-label"><strong>Meta Title</strong></label>
                                    <textarea name="meta_title" id="description" rows="4" placeholder="Meta Title" class="form-control"> @if(!empty($productdata['meta_title'])){{ $productdata['meta_title'] }} @else {{ old('meta_title') }} @endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta-title" class=" form-control-label"><strong>Meta Keywords</strong></label>
                                    <textarea name="meta_keywords" id="meta_keywords" rows="4" placeholder="Product Meta Keywords........" class="form-control"> @if(!empty($productdata['meta_keywords'])){{ $productdata['meta_keywords'] }} @else {{ old('meta_keywords') }} @endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta-title" class=" form-control-label"><strong>Meta Description</strong></label>
                                    <textarea name="meta_description" id="meta_description" rows="4" placeholder="Product Meta Desctiption....." class="form-control"> @if(!empty($productdata['meta_description'])){{ $productdata['meta_description'] }} @else {{ old('meta_description') }} @endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
