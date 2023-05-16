@extends('adminpanel.layouts.master')
@section('title')
    Change Password
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-secondary">User Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home icon-color-customize"></i></a></li>
              <li class="breadcrumb-item">Profile</li>
              <li class="breadcrumb-item active">Change Password</li>
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
            <section class="col-md-6 offset-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     <h4 class="header-title">Edit Password</h4>
                     <form action="{{ route('admin.password.update') }}" method="POST">
                         @csrf
                         <div class="form-group">
                             <label for="currentPassword">Current Password</label>
                             <input type="password" id="currentPassword" name="currentPassword" class="form-control @error('currentPassword') is-invalid @enderror" placeholder="Enter Current Password">
                             @error('currentPassword')
                                 <div class="alert alert-danger mt-2">{{ $message }}</div>
                             @enderror
                         </div>
                         <div class="form-group">
                             <label for="password">New Password</label>
                             <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                             @error('password')
                                 <div class="alert alert-danger mt-2">{{ $message }}</div>
                             @enderror
                         </div>
                         <div class="form-group">
                             <label for="passwordConfirm">Confirm Password</label>
                             <input type="password" id="passwordConfirm" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password">
                         </div>

                         <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><i class="fa fa-check"></i> Update Password</button>
                     </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            <!-- /.card -->
            <!-- /.card -->
         </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection