@extends('admin.layouts.app')

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
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">

          <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Permission</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('includes.messages')
              <form role="form" action="{{ route('permission.store') }}" method="POST">
                  {{ csrf_field() }}
                <div class="card-body">
					<div class="row">
                	<div class="col-lg-12">
	                	<div class="form-group">
	                    <label for="title">Permission Title</label>
	                    <input type="text" class="form-control" name="name" id="permission" placeholder="permission Title">
	                  </div>
                    <div class="form-group">
                      <label for="for">Permisson</label>
                      <select name="for" id="for" class="form-control">
                        <option selected disable>Select Permission for</option>
                        <option value="User">User</option>
                        <option value="Post">Post</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                	</div>

				</div> <!-- /.row -->

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
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