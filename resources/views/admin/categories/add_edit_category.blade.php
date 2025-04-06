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
                            <li><a href="#">Category</a></li>
                            <li class="active">Add Category</li>
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

                            @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissable fade show" role="alert" style="margin-top:10px;">
                                {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            @endif
                            <form id="CategoryForm" @if(empty($categorydata->id)) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/'.$categorydata->id) }}" @endif method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group text-center">
                                </div>
                                <div class="form-group">
                                    <label for="category_name" class="control-label mb-1">Category Name</label>
                                    <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter category name" @if(!empty($categorydata->category_name)) value="{{ $categorydata->category_name }}" @else value="{{ old('category_name') }}" @endif>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="category_icon" class="control-label mb-1"><strong>Category Icon</strong></label>
                                    <div data-placeholder="Select">
                                        <select class="form-control" name="categoryIcon" id="categoryIcon" required>
                                            <option value="0">Please select</option>
                                            @foreach($categoryAssets as $asset)
                                                <option data-image="{{ $asset->color_url }}" value="{{ $asset['id'] }}" @if(!empty($asset->category_id) && $asset->category_id == $asset['id']) selected ="" @endif>{{ $asset['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <label class="form-label">Category Icon</label>
                                    <div class="custom-select" data-placeholder="Select">
                                        <div class="select-image">
                                            <img src="" alt="">
                                        </div>
                                        <select id="imageSelect" name="categoryImageId" required>
                                            <option value="">Select Category Icon</option>
                                            @foreach ($categoryAssets as $asset)
                                            <option value="{{ $asset->id }}" data-image="{{ $asset->color_url }}">{{ $asset->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Category Description</label>
                                    <div class="row form-group">
                                        <div class="col-12"><textarea name="description" id="description" rows="9" placeholder="Category description....." class="form-control">@if(!empty($categorydata->description)) {{ $categorydata->description }} @else {{ old('description') }} @endif</textarea></div>
                                    </div>
                                </div>
                                  
                                <div class="row">
                                   <!--  <div class="col-6">
                                        <div class="form-group">
                                            <label for="product_image" class="control-label mb-1"><strong>Category Image (Optional)</strong></label>
                                            <input type="file" name="main_image" id="file-input" class="form-control-file">
                                        </div>
                                    </div> -->
                                    <div class="col-6 mt-3">
                                        <div class="form-group">
                                            <label for="featured_item"><strong>Featured Item</strong></label>
                                            <input type="checkbox" name="is_cover" id="is_cover" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="create-category" type="submit" class="btn btn-lg btn-info btn-block">
                                        @if(empty($categorydata->id))
                                            <span id="create-category">Create Category</span>
                                        @else 
                                            <span id="create-category">Edit Category</span>
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