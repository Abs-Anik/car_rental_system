@extends('adminpanel.layouts.master')
@section('title')
    Setting
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-secondary">Website Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home icon-color-customize"></i></a></li>
                <li class="breadcrumb-item">Settings</li>
                @if (!empty($data))
                <li class="breadcrumb-item active">Edit</li>
                @else
                <li class="breadcrumb-item active">Create</li>
                @endif
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
                        <h4 class="header-title mb-0 pl-3 pt-3">SETTING</h4>
                    </div>
                    <form action=" @if (!empty($data))
                        {{ route('admin.setting.update',$data->id) }} 
                        @else
                        {{ route('admin.setting.store') }}  
                        @endif " 
                        method="POST" 
                        id="form" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-body">
                        <div class="card-body">
                            <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="title" class="form-control-label">Title: </label>
                                <input id="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title" @if (!empty($data->title)) value="{{$data->title}}"  @else value="{{old('title')}}" @endif placeholder="Enter Title" data-parsley-error-message="Please give title" required autocomplete="title" autofocus>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="slogan" class="form-control-label">Slogan: </label>
                                <input id="slogan" class="form-control @error('slogan') is-invalid @enderror" type="text" name="slogan" @if (!empty($data->slogan)) value="{{$data->slogan}}"  @else value="{{old('slogan')}}" @endif placeholder="Enter Slogan" data-parsley-error-message="Please give slogan" required autocomplete="slogan" autofocus>
                                @error('slogan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="shortDescription" class="form-control-label">Short Description: </label>
                                <textarea name="shortDescription" id="shortDescription" cols="30" rows="10" class="form-control @error('shortDescription') is-invalid @enderror summernote" placeholder="Write short description" data-parsley-error-message="Please give short description">@if (!empty($data->shortDescription)) {{$data->shortDescription}} @endif</textarea>
                                @error('shortDescription')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="longDescription" class="form-control-label">Long Description: </label>
                                <textarea name="longDescription" id="longDescription" cols="30" rows="10" class="form-control @error('longDescription') is-invalid @enderror summernote" placeholder="Write long description" data-parsley-error-message="Please give long description">@if (!empty($data->longDescription)) {{$data->longDescription}} @endif</textarea>
                                @error('longDescription')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            @if (!empty($data->strHomeBanner))

                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="strHomeBanner" class="form-control-label">Home Banner: </label>
                                <input type="file" class="form-control @error('strHomeBanner') is-invalid @enderror dropify" name="strHomeBanner" data-default-file="{{ asset('public/adminpanel/assets/setting/'.$data->strHomeBanner) }}">
                                @error('strHomeBanner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                                
                            @else

                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="strHomeBanner" class="form-control-label">Home Banner: </label>
                                <input type="file" class="form-control @error('strHomeBanner') is-invalid @enderror dropify" name="strHomeBanner" data-default-file="">
                                @error('strHomeBanner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                                
                            @endif

                            @if (!empty($data->strVideo))

                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="strVideo" class="form-control-label">Upload Video: </label>
                                <input type="file" class="form-control @error('strVideo') is-invalid @enderror dropify" name="strVideo" data-default-file="{{ asset('public/adminpanel/assets/setting/'.$data->strVideo) }}">
                                @error('strVideo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                                
                            @else

                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="strVideo" class="form-control-label">Upload Video: </label>
                                <input type="file" class="form-control @error('strVideo') is-invalid @enderror dropify" name="strVideo" data-default-file="">
                                @error('strVideo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                                
                            @endif

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="experience" class="form-control-label">Experience: </label>
                                <input id="experience" class="form-control @error('experience') is-invalid @enderror" type="text" name="experience" @if (!empty($data->experience)) value="{{$data->experience}}"  @else value="{{old('experience')}}" @endif placeholder="Enter Number of Experience" data-parsley-error-message="Please give experience" required autocomplete="experience" autofocus>
                                @error('experience')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="strLink" class="form-control-label">Linkedin Link: </label>
                                <input id="strLink" class="form-control @error('strLink') is-invalid @enderror" type="text" name="strLink" @if (!empty($data->strLink)) value="{{$data->strLink}}"  @else value="{{old('strLink')}}" @endif placeholder="Enter Linkedin Link" data-parsley-error-message="Please give link" required autocomplete="strLink" autofocus>
                                @error('strLink')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="strFace" class="form-control-label">Facebook Link: </label>
                                <input id="strFace" class="form-control @error('strFace') is-invalid @enderror" type="text" name="strFace" @if (!empty($data->strFace)) value="{{$data->strFace}}"  @else value="{{old('strFace')}}" @endif placeholder="Enter Facebook Link" data-parsley-error-message="Please give facebook link" required autocomplete="strFace" autofocus>
                                @error('strFace')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="strInsta" class="form-control-label">Instagram Link: </label>
                                <input id="strInsta" class="form-control @error('strInsta') is-invalid @enderror" type="text" name="strInsta" @if (!empty($data->strInsta)) value="{{$data->strInsta}}"  @else value="{{old('strInsta')}}" @endif placeholder="Enter Instagram Link" data-parsley-error-message="Please give instagram link" required autocomplete="strInsta" autofocus>
                                @error('strInsta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="strFooter" class="form-control-label">Footer: </label>
                                <input id="strFooter" class="form-control @error('strFooter') is-invalid @enderror" type="text" name="strFooter" @if (!empty($data->strFooter)) value="{{$data->strFooter}}"  @else value="{{old('strFooter')}}" @endif placeholder="Enter Footer" data-parsley-error-message="Please give footer" required autocomplete="strFooter" autofocus>
                                @error('strFooter')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="strLocation" class="form-control-label">Location: </label>
                                <input id="strLocation" class="form-control @error('strLocation') is-invalid @enderror" type="text" name="strLocation" @if (!empty($data->strLocation)) value="{{$data->strLocation}}"  @else value="{{old('strLocation')}}" @endif placeholder="Enter Location" data-parsley-error-message="Please give location" required autocomplete="strLocation" autofocus>
                                @error('strLocation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="strContact" class="form-control-label">Contact: </label>
                                <input id="strContact" class="form-control @error('strContact') is-invalid @enderror" type="text" name="strContact" @if (!empty($data->strContact)) value="{{$data->strContact}}"  @else value="{{old('strContact')}}" @endif placeholder="Enter Contact" data-parsley-error-message="Please give contact" required autocomplete="strContact" autofocus>
                                @error('strContact')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="strEmail" class="form-control-label">Email: </label>
                                <input id="strEmail" class="form-control @error('strEmail') is-invalid @enderror" type="text" name="strEmail" @if (!empty($data->strEmail)) value="{{$data->strEmail}}"  @else value="{{old('strEmail')}}" @endif placeholder="Enter Email" data-parsley-error-message="Please give email" required autocomplete="strEmail" autofocus>
                                @error('strEmail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                <label for="strMap" class="form-control-label">Map Link: </label>
                                <input id="strMap" class="form-control @error('strMap') is-invalid @enderror" type="text" name="strMap" @if (!empty($data->strMap)) value="{{$data->strMap}}"  @else value="{{old('strMap')}}" @endif placeholder="Enter Map Link" data-parsley-error-message="Please give map link" required autocomplete="strMap" autofocus>
                                @error('strMap')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div><!-- col-4 -->
                            </div><!-- row -->

                            <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5" style="cursor:pointer"><i class="fa fa-check"></i> @if (!empty($data)) UPDATE @else SAVE @endif</button>
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