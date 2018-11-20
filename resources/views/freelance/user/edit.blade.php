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
              <form role="form" action="{{ route('freelance.user.update',$freelancer->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Contact FirstName</label>
                      <input type="name" class="form-control" name="name" id="name" placeholder="name" value="@if (old('name')){{ old('name') }}@else {{ $freelancer->name }}@endif">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="lastname">Contact LastName</label>
                      <input type="lastname" class="form-control" name="lastname" id="lastname" placeholder="lastname" value="@if (old('lastname')){{ old('lastname') }}@else {{ $freelancer->lastname }}@endif">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="email">Company Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="@if (old('email')){{ old('email') }}@else {{ $freelancer->email }}@endif">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" value="@if (old('email')){{ old('email') }}@else {{ $freelancer->phone }}@endif">
                    </div>
                  
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('freelance.user.show') }}" class="btn btn-warning">Back</a>
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