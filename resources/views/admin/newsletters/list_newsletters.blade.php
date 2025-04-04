@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Subscribers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Subscribers</a></li>
                            <li class="active">List Subscribers</li>
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
                    <strong class="card-title">All Customers</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subscribed on</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        @foreach($newsletters as $newsletter)
                            <tbody>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $newsletter->email }}</td>
                                    <td> {{ \Carbon\Carbon::parse($newsletter->created_at)->format('D, j M Y')}}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="confirmDelete btn btn-danger btn-sm" record="newsletter" recordid="{{ $newsletter->id }}" type="button">Delete</a>
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