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
                            <li><a href="#">Banner</a></li>
                            <li class="active">Add Banner</li>
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
                            <form id="BannerForm" @if(empty($bannerdata->id)) action="{{ url('admin/add-edit-banner') }}" @else action="{{ url('admin/add-edit-banner/'.$bannerdata->id) }}" @endif method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group text-center">
                                </div>
                                <div class="form-group">
                                    <label for="banner_image" class="control-label mb-1"><strong>Banner Image</label>
                                    <input type="file" name="main_image" id="file-input" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><strong>Recommended Image Size:(Width:844px, Height: 706px)</strong></label>
                                    @if(!empty($bannerdata->image_id))
                                        <div><img style="width:50px; margin-top: 5px; margin-bottom:5px;" src="{{ $bannerdata->image_url }}" alt="">
                                        &nbsp; 
                                        <a class="confirmDelete" href="javascript:void(0)" record="product-image" recordid="{{ $bannerdata->id }}" >Delete Image</a>
                                        </div>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="category_name" class="control-label mb-1"><strong>Banner Title (Heading)</strong></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Banner Title" @if(!empty($bannerdata->title)) value="{{ $bannerdata->title }}" @else value="{{ old('title') }}" @endif>
                                </div>
                                <br>
                                
                                <div class="form-group">
                                    <label for="alt"><strong>Banner Alternative Text (Sub Heading)</strong> </label>
                                    <input type="text" class="form-control" name="alt" id="alt" placeholder="Enter Banner Title" @if(!empty($bannerdata->alt)) value="{{ $bannerdata->alt }}" @else value="{{ old('alt') }}" @endif>
                                </div>            
                                
                                <div>
                                    <button id="create-banner" type="submit" class="btn btn-lg btn-info btn-block">
                                        @if(empty($bannerdata->id))
                                            <span id="create-banner">Create Banner</span>
                                        @else 
                                            <span id="create-banner">Edit Banner</span>
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