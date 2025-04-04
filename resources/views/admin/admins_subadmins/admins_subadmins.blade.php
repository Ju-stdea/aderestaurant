@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Admins Sub Admins</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li class="active">Admins / Sub-Admins</li>
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
                    <strong class="card-title">Admins/Sub-Admins</strong>
                    <a href="{{ url('admin/add-edit-admin-subadmin') }}" style="max-width: 250px; float:right;" class="btn btn-block btn-success"> Add Admin / Sub Admins</a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach($admins as $admin)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                            <td>{{ $admin->mobile }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                @foreach($admin->roles as $role)
                                {{ strtoupper($role->name) }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>{{ $admin->status }}</td>
                            <td style="white-space: nowrap;">
                                @if(!$admin->roles->contains('name', 'superadmin'))
                                <a href="{{ url('admin/add-edit-admin-subadmin/'.$admin->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.toggleStatus', $admin->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $admin->status == 'ACTIVE' ? 'INACTIVE' : 'ACTIVE' }}">
                                    <button type="submit" class="btn btn-sm {{ $admin->status == 'ACTIVE' ? 'btn-danger' : 'btn-success' }}">
                                        {{ $admin->status == 'ACTIVE' ? 'Disable' : 'Enable' }}
                                    </button>
                                </form>
                                <a href="{{ url('admin/permissions/'.$admin->id.'/'.$role->id) }}" type="button" class="btn btn-warning btn-sm">Permissions</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection