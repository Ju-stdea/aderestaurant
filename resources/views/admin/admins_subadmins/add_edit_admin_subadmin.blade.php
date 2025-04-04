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
                            <li><a href="#">Admin/SubAdmin</a></li>
                            <li class="active">{{ $title }}</li>
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
                    <a href="{{ url('admin/admins-subadmins') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Go Back
                    </a>
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
                            <form id="CategoryForm" action="{{ url('admin/add-edit-admin-subadmin', $admin->id ?? '') }}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group text-center">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admin_first_name" class="control-label mb-1"><strong>First Name </strong></label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter first name" value="{{ old('first_name', $admin->first_name ?? '') }}">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="cc-name" class="control-label mb-1"><strong>Last Name</strong></label>
                                            <input id="last_name" name="last_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter last name" value="{{ old('last_name', $admin->last_name ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admin_mobile" class="control-label mb-1"><strong>Phone No</strong></label>
                                            <input id="mobile" name="mobile" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Mobile" value="{{ old('mobile', $admin->mobile ?? '') }}">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="cc-name" class="control-label mb-1"><strong>Email</strong></label>
                                            <input id="email" name="email" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Email" value="{{ old('email', $admin->email ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admin_type" class="control-label mb-1"><strong>Role Type</strong></label>
                                            <select id="admin_type" class="form-control" name="admin_type" style="text-transform: uppercase;">
                                                <option value="0">Please select</option>
                                                @foreach($roles as $role)
                                                <option class="text-uppercase" value="{{ $role->id }}" {{ old('admin_type', $adminRole ?? '') == $role->id ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="password" class="control-label mb-1"><strong>Password</strong></label>
                                            <input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter password" value="{{ old('password') }}">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="create-admin" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="create-admin">{{ empty($admin->id) ? 'Create Admin' : 'Update Admin' }}</span>
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