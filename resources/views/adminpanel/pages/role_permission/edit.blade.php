@extends('adminpanel.layouts.master')
@section('title')
    Role & Permission Edit
@endsection
@section('extra_css')
<link rel="stylesheet" href="{{ asset('public/adminpanel/assets/dist/css/role_permission.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Role & Permission Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Role & Permission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <div class="card pd-20 pd-sm-40">
                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                        <h4 class="header-title mb-0 p-4">Edit Role</h4>
                    </div>
                    <form action="{{ route('admin.rolePermission.update', $role->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Role Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" placeholder="Enter Role Name" required=""/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label" for="allManagement">Assign Permissions
                                            <span class="optional">(optional)</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="allManagement" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="allManagement">
                                                <strong>All</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                @php $i = 1;  @endphp
                                @foreach ($permissions_group as $group)
                                    <!-- Single Menu Roles -->
                                    <div class="row role-{{ $i }}-managements">
                                        @php
                                            $permissions = App\Models\User::getPermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp

                                        <div class="col-md-3">
                                            <label class="control-label" for="{{ $i }}Management">{{ $group->title }}</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $i }}Management" onclick="checkPrmissions('role-{{ $i }}-managements', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="{{ $i }}Management">
                                                    <strong>All</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 role-{{ $i }}-managements-checkbox">
                                            @foreach ($permissions as $permission)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $i }}-{{ $j }}" name="permissions[]"  value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} onclick="checkSinglePrmission('role-{{ $i }}-managements', '{{ $i }}Management', <?php echo count($permissions); ?>)">
                                                <label class="custom-control-label" for="{{ $i }}-{{ $j }}">{{ $permission->title }}</label>
                                            </div>
                                            @php $j++; @endphp
                                            @endforeach

                                        </div>
                                        <hr>
                                    </div>
                                    <hr>
                                    <!-- Single Menu Roles -->
                                    @php $i++; @endphp
                                @endforeach

                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success" style="cursor: pointer"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ route('admin.rolePermission.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Cancel</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('extra_js')
@include('adminpanel.layouts.partials.role_permission_script')
@endsection