@extends('adminpanel.layouts.master')
@section('title')
    Edit Profile
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home icon-color-customize"></i></a></li>
                <li class="breadcrumb-item">Profile</li>
                <li class="breadcrumb-item active">Edit</li>
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
                        <h4 class="header-title mb-0 pl-3 pt-3">PROFILE</h4>
                    </div>
                    <form action="{{ route('admin.profile.update', $user->id) }}" method="POST" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                        <div class="card-body">
                            <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="first_name" class="form-control-label">First Name: </label>
                                <input id="first_name" class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $user->first_name }}" placeholder="Enter First Name" data-parsley-error-message="Please give user first name" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="last_name" class="form-control-label">Last Name: </label>
                                <input id="last_name" class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Enter Last Name" data-parsley-error-message="Please give user last name" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="username" class="form-control-label">User Name: </label>
                                <input id="username" class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ $user->username }}" placeholder="Enter User Name" data-parsley-error-message="Please give user username" required autocomplete="username" autofocus>
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="email" class="form-control-label">Email: </label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email }}" placeholder="Enter User Email" data-parsley-error-message="Please give user email" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="phone" class="form-control-label">Phone: </label>
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter User Phone Number" data-parsley-error-message="Please give user phone" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                            @if (!empty($user->image))
                            <div class="form-group col-md-12">
                                <label for="image">Profile Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror dropify" name="image" data-default-file="{{ asset('public/adminpanel/assets/profile/'.$user->image) }}">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @else
                            <div class="form-group col-md-12">
                                <label for="image">Profile Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror dropify" name="image" data-default-file="{{ asset('public/adminpanel/assets/profile/avatar.png') }}">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif
                            </div><!-- row -->

                            <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5" style="cursor:pointer"><i class="fa fa-check"></i> Update</button>
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