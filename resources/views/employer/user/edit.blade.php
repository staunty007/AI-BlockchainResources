@extends('employer.layouts.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-11">

          <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
                @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                  <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
               @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{-- @include('includes.messages') --}}
              <form role="form" action="{{ route('employer.user.update',$employer->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Company Name</label>
                      <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="@if (old('company_name')){{ old('company_name') }}@else{{$employer->company_name }}@endif">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Company Industry</label>
                      <input type="text" class="form-control" name="company_industry" id="company_industry" placeholder="Company Industry" value="@if (old('company_industry')){{ old('company_industry') }}@else{{$employer->company_industry }}@endif">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Company Location</label>
                      <input type="text" class="form-control" name="company_location" id="company_location" placeholder="Company Location" value="@if (old('company_location')){{ old('company_location') }}@else{{$employer->company_location }}@endif">
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="name">Company Location</label>
                      <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" placeholder="Place some text here" name="company_description" 
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $employer->company_description }}</textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Company Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="@if (old('email')){{ old('email') }}@else {{ $employer->email }}@endif">
                    </div>
                    <div class="form-group">
                      <label for="name">Contact FirstName</label>
                      <input type="name" class="form-control" name="name" id="name" placeholder="name" value="@if (old('name')){{ old('name') }}@else {{ $employer->name }}@endif">
                    </div>
                    <div class="form-group">
                      <label for="lastname">Contact LastName</label>
                      <input type="lastname" class="form-control" name="lastname" id="lastname" placeholder="lastname" value="@if (old('lastname')){{ old('lastname') }}@else {{ $employer->lastname }}@endif">
                    </div>
                  </div>
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('employer.user.show') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection