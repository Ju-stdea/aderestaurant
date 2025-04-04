@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header bg-light py-4">
    <div class="container-fluid">
      <div class="row m-2">
        <table class="float-sm-right">
          <tr>
            <td class="pr-2"><a href="#" class="text-info">Home</a></td>
            <td class="pr-2"><a href="{{ url('admin/admins-subadmins') }}" class="text-info">Admins/SubAdmins</a></td>
            <td class="text-muted">Manage Permissions</td>
          </tr>
        </table>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      <form name="adminForm" id="adminForm" method="POST" action="{{ url('admin/permissions/'.$admin->id.'/'.$role->id) }}">
        @csrf
        <div class="card border-info mb-3">
          <div class="card-header bg-info text-white">
            <h6 class="card-title text-uppercase">Assign Permissions For {{ $admin->first_name }} {{ $admin->last_name }} [{{$role->name}}]</h6>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Permission</th>
                  <th scope="col">Description</th>
                  <th scope="col">Assign</th>
                </tr>
              </thead>
              <tbody>
                @foreach($permissions as $permission)
                <tr>
                  <td>{{ $permission->name }}</td>
                  <td>{{ $permission->description }}</td>
                  <td>
                    <div class="form-check">
                      <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" {{ in_array($permission->id, $assignedPermissions) ? 'checked' : '' }}>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer bg-white">
            <button style="width: 100%;" type="submit" class="btn btn-danger text-danger text-uppercase">Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection