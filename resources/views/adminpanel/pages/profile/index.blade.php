@extends('adminpanel.layouts.master')
@section('title')
    Admin Profile
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
              <li class="breadcrumb-item active">Profile</li>
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
            <section class="col-md-4 offset-md-4 mt-5">
                   <!-- Profile Image -->
                   <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                       <div class="text-center">
                           @if(!empty($user->image))
                           <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('public/adminpanel/assets/profile/'.$user->image)}}"
                           alt="User profile picture" height="150px" width="150px">
                           @else
                           <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('public/adminpanel/assets/profile/avatar.png')}}"
                           alt="User profile picture">
                           @endif
                       </div>

                       @if (!empty($user->first_name) && !empty($user->last_name))
                       <h3 class="profile-username text-center mt-2 mb-2"><span style="text-transform: capitalize">{{ $user->first_name }} {{ $user->last_name }}</span></h3>
                       @else
                       <h3 class="text-center">Not Found</h3>
                       @endif
                       <ul class="list-group list-group-unbordered mb-3">
                            @if (!empty($user->username))
                            <li class="list-group-item">
                                <b>User Name</b> <a class="float-right">{{ $user->username }}</a>
                            </li>
                            @else
                            <li class="list-group-item">
                                <b>User Name</b> <a class="float-right">Not Found</a>
                            </li>
                            @endif
                           @if (!empty($user->phone))
                           <li class="list-group-item">
                               <b>Mobile No</b> <a class="float-right">{{ $user->phone }}</a>
                             </li>
                           @else
                           <li class="list-group-item">
                               <b>Mobile No</b> <a class="float-right">Not Found</a>
                            </li>
                           @endif
                           @if (!empty($user->email))
                           <li class="list-group-item">
                               <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                             </li>
                           @else
                           <li class="list-group-item">
                               <b>Email</b> <a class="float-right">Not Found</a>
                             </li>
                           @endif
                       </ul>

                       <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                       <a href="{{ route('admin.password.change') }}" class="btn btn-info btn-block"><b>Change Password</b></a>
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