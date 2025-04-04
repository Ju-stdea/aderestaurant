@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Category</a></li>
                            <li class="active">List Categories</li>
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
                    <strong class="card-title">Categories</strong>
                    <a href="{{ url('admin/add-edit-category') }}" style="max-width: 150px; float:right;" class="btn btn-block btn-success"> Add Category</a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Featured Image</th>
                                <th scope="col">Icon Path</th>
                                <th scope="col">Products</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach($categories as $category)
                            <tbody>

                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    
                                    <td>
                                        @if(!empty($category->image_url))
                                          <img style="width:70px;" src="{{ $category->image_url }}" alt="">
                                        @else
                                          <img style="width:70px;" src="{{ asset('images/front_images/homepage-one/small-no-image.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($category->asset_image_url))
                                          <img style="width:70px;" src="{{ $category->asset_image_url }}" alt="">
                                        @else
                                          <img style="width:70px;" src="{{ asset('images/front_images/homepage-one/small-no-image.png') }}" alt="">
                                        @endif
                                    </td>
                                    @php
                                         $CategoryId = $category->id;
                                        $count = \App\Models\Product::where('category_id', $CategoryId)
                                            ->where('status', 'ACTIVE')
                                            ->count();
                                    @endphp
                                    <td>{{ $count }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        @if($category->status == 'ACTIVE')
                                            <a class="updateCategoryStatus btn btn-success btn-sm" id="category-{{ $category->id }}" category_id="{{ $category->id }}" href="javascript:void(0)" data-status="ACTIVE">
                                                ACTIVE
                                            </a>
                                        @else 
                                            <a class="updateCategoryStatus btn btn-info btn-sm" id="category-{{ $category->id }}" category_id="{{ $category->id }}" href="javascript:void(0)" data-status="INACTIVE">
                                                INACTIVE
                                            </a>
                                        @endif
                                        <a href="{{ url('admin/add-edit-category/'.$category->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>

                                        <a href="javascript:void(0)" class="confirmDelete btn btn-danger btn-sm" record="category" recordid="{{ $category['id'] }}" type="button">Delete</a>
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