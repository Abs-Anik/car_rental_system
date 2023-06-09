@extends('adminpanel.layouts.master')
@section('title')
    Role & Permission List
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-secondary">Role & Permission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home icon-color-customize"></i></a></li>
              <li class="breadcrumb-item">Role & Permission</li>
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
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                            <h4 class="header-title mb-0">ROLE</h4>
                            <a class="customize-color" href="{{ route('admin.rolePermission.create') }}"><i class="fa fa-plus-circle icon-color-customize"></i> Add New Role</a>
                        </div>
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Role Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                            <a class="btn bg-gradient-primary btn-xs" href="{{ route('admin.rolePermission.show', $role->id) }}"><i class="fa fa-eye"></i> </a>

                                            <a class="btn bg-gradient-success btn-xs" href="{{ route('admin.rolePermission.edit', $role->id) }}"><i class="fa fa-edit"></i> </a>

                                            <form method="POST" action="{{ route('admin.rolePermission.destroy', $role->id) }}" style="display:inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn bg-gradient-danger btn-xs show_confirm" style="cursor:pointer" id="delete"><i class="fa fa-trash"></i> </button>
                                            </form>

                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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