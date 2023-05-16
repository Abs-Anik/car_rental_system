@extends('adminpanel.layouts.master')
@section('title')
    Admin List
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-secondary">Admin List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">             
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home icon-color-customize"></i></a></li>
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Admin List</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <h4 class="header-title mb-0">ADMIN</h4>
                            <a class="customize-color" href="{{ route('admin.registration.create') }}"><i class="fa fa-plus-circle customize-color"></i> Add New Admin</a>
                        </div>
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><span style="text-transform: capitalize">{{ $admin->username }}</span></td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                             <a class="btn bg-gradient-success btn-xs" href="{{ route('admin.registration.edit', $admin->id) }}"><i class="fa fa-edit"></i> </a>
                                             <form method="POST" action="{{ route('admin.registration.destroy', $admin->id) }}" style="display:inline-block">
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