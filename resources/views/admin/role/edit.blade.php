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
                <h3 class="card-title">Edit Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('includes.messages')
              <form role="form" action="{{ route('role.update',$role->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <div class="card-body">
          <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="tag">Role Title</label>
                      <input type="text" class="form-control" name="name" id="role" placeholder="role Title" value="{{ $role->name }}">
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">

                      <label for="tag">Post Permissions</label>
                      @foreach ($permissions as $permission)
                         @if ($permission->for == 'Post')
                           <div class="checkbox">
                        <label for=""><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                          @foreach ($role->permissions as $role_permit)
                            @if ($role_permit->id == $permission->id)
                              checked
                            @endif
                          @endforeach
                          > {{ $permission->name }}</label>
                      </div>
                         @endif
                      @endforeach

                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">

                      <label for="tag">User Permissions</label>
                        @foreach ($permissions as $permission)
                         @if ($permission->for == 'User')
                           <div class="checkbox">
                        <label for=""><input type="checkbox" name="permission[]"  value="{{ $permission->id }}"
                          @foreach ($role->permissions as $role_permit)
                            @if ($role_permit->id == $permission->id)
                              checked
                            @endif
                          @endforeach
                          > {{ $permission->name }}</label>
                      </div>
                         @endif
                      @endforeach

                    </div>
                    </div>

                  <div class="col-lg-4">
                    <div class="form-group">

                      <label for="tag">Other Permissions</label>
                        @foreach ($permissions as $permission)
                         @if ($permission->for == 'Other')
                           <div class="checkbox">
                        <label for=""><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                            @foreach ($role->permissions as $role_permit)
                            @if ($role_permit->id == $permission->id)
                              checked
                            @endif
                          @endforeach
                          > {{ $permission->name }}</label>
                      </div>
                         @endif
                      @endforeach

                    </div>
                    </div>

                  </div>

        </div> <!-- /.row -->

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
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