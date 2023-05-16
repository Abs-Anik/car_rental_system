@extends('adminpanel.layouts.master')
@section('title')
    Admin Create
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-secondary">Admin Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home icon-color-customize"></i></a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Create Admin</li>
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
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0 pl-3 pt-3">ADMIN</h4>
                    </div>
                    <form action="{{ route('admin.registration.store') }}" method="POST" id="form">
                        @csrf
                        @method('post')
                        <div class="form-body">
                        <div class="card-body">
                            <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="first_name" class="form-control-label">First Name: </label>
                                <input id="first_name" class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name" data-parsley-error-message="Please give user first name" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="last_name" class="form-control-label">Last Name: </label>
                                <input id="last_name" class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name" data-parsley-error-message="Please give user last name" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="username" class="form-control-label">User Name: </label>
                                <input id="username" class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" placeholder="Enter User Name" data-parsley-error-message="Please give user username" required autocomplete="username" autofocus>
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="email" class="form-control-label">Email: </label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Enter User Email" data-parsley-error-message="Please give user email" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="password" class="form-control-label">Password: </label>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}" placeholder="Enter User Password" data-parsley-error-message="Please give user password" required autocomplete="new-password" autofocus>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="password-confirm" class="form-control-label">Confirm Password: </label>
                                <input id="password-confirm" class="form-control" type="password" name="password_confirmation" placeholder="Enter User Confirm Password" data-parsley-error-message="Please give user confirm password" required autocomplete="new-password">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="roles">Assign Roles <span class="optional">(optional)</span></label>
                                    <br>
                                    <select class="roles_select form-control custom-select " id="roles" name="roles[]" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            </div><!-- row -->

                            <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5" style="cursor:pointer"><i class="fa fa-check"></i> Register</button>
                            </div><!-- form-layout-footer -->
                        </div>
                        </div><!-- form-layout -->
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