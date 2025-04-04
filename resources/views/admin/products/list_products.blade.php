@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Products</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Products</a></li>
                            <li class="active">List Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
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
                    <strong class="card-title">Products</strong>
                    <a href="{{ url('admin/add-edit-product') }}" style="max-width: 150px; float:right;" class="btn btn-block btn-success"> Add Product</a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Reviews</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->product_name }}</td>
                                    <td>${{ $product->product_price }}</td>
                                    <td>
                                        <img style="width:100px; height:100px" src="{{ $product->image_url }}" alt="">
                                    </td>
                                    <td>
                                        @if($product->stock > 0)
                                            {{ $product->stock }}
                                        @else
                                            <span class="badge bg-danger text-white">Out of Stock</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="ratings" style="display: flex; flex-direction: column; align-items: center;">
                                            <div class="stars" style="display: flex; gap: 2px;">
                                                @for ($ratings = 1; $ratings <= 5; $ratings++)
                                                    @if ($product->ratings >= $ratings)
                                                        <span>
                                                            <svg width="15" height="15" viewBox="0 0 15 15"  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" 
                                                                fill="#FFA800" />
                                                            </svg>
                                                        </span>
                                                    @else
                                                        <span>
                                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" 
                                                            fill="#E0E0E0" />
                                                            </svg>
                                                        </span>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div style="text-align: center; margin-top: 5px;">
                                                <strong>
                                                    <a href="{{ url('admin/product/list-reviews', $product->id) }}" style="text-decoration: underline;">{{ $product->review_count }}</a>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    @php
                                        $CategoryId = $product->category_id;
                                        $categoryName = \App\Models\Category::where('id', $CategoryId)->value('category_name');
                                    @endphp
                                    <td>{{ $categoryName }}</td>
                                    <td>
                                        @if($product->status == 'ACTIVE')
                                            <a class="updateProductStatus btn btn-success btn-sm" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)" data-status="ACTIVE">
                                                ACTIVE
                                            </a>
                                        @else 
                                            <a class="updateProductStatus btn btn-info btn-sm" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)" data-status="INACTIVE">
                                                INACTIVE
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/add-edit-product/'.$product->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ url('admin/add-images/'.$product->id) }}" type="button" class="btn btn-warning btn-sm">Images</a>
                                        {{-- <a href="{{ url('admin/add-attributes/'.$product->id) }}" type="button" class="btn btn-warning btn-sm">Attributes</a> --}}

                                        <a href="javascript:void(0)" class="confirmDelete btn btn-danger btn-sm" record="product" recordid="{{ $product->id }}" type="button">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection