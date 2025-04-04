@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Banners</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Banner</a></li>
                            <li class="active">List Banners</li>
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
                    <strong class="card-title">Banners</strong>
                    <a href="{{ url('admin/add-edit-banner') }}" style="max-width: 150px; float:right;" class="btn btn-block btn-success"> Add Banner</a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title (Heading)</th>
                                <th scope="col">Alternative (SubHeading)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach($banners as $banner)
                            <tbody>

                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img style="width:100px;" src="{{ $banner->image_url }}" alt="">
                                    </td>
                                    <td>
                                        {{ $banner->title}}
                                    </td>
                                    
                                    <td>
                                        {{ $banner->alt}}
                                    </td>
                                    <td>
                                        @if($banner->status == 'ACTIVE')
                                            <a class="updateBannerStatus btn btn-success btn-sm" id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}" href="javascript:void(0)" data-status="ACTIVE">
                                                ACTIVE
                                            </a>
                                        @else 
                                            <a class="updateBannerStatus btn btn-info btn-sm" id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}" href="javascript:void(0)" data-status="INACTIVE">
                                                INACTIVE
                                            </a>
                                        @endif
                                        <a href="{{ url('admin/add-edit-banner/'.$banner->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>

                                        <a href="javascript:void(0)" class="confirmDelete btn btn-danger btn-sm" record="banner" recordid="{{ $banner['id'] }}" type="button">Delete</a>
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