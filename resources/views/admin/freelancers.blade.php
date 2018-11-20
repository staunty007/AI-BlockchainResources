@extends('admin.layouts.app')
@section('headsection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">
  <style>
        .example-modal .modal {
          position: relative;
          top: auto;
          bottom: auto;
          right: auto;
          left: auto;
          display: block;
          z-index: 1;
        }

        .example-modal .modal {
          background: transparent !important;
        }
      </style>
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Freelancers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                  @include('includes.messages')
                  @include('includes.flash-message')
                </div>
                <div class="col-md-4">
                  @can('users.create', Auth::user())
                 {{--  <a href="{{ route('user.create') }}" class="btn btn-success pull-right">Add New Employer</a> --}}
                  @endcan
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Reset Password</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($freelancers as $freelancer)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td><a href="{{ route('admin.freelancer.posts',$freelancer->id) }}">
                        {{ $freelancer->name .' '. $freelancer->lastname}}
                      </a></td>
                      <td>{{ $freelancer->email }}</td>
                      <td>{{ $freelancer->phone }}</td>
                      <td>
                        <button type="button" class="btn btn-warning btn-block" data-mypassword="" data-myconfirm_password="" data-myfreelance_id="{{$freelancer->id}}" data-toggle="modal" data-target="#reset-password">
                          Reset
                        </button>
                      </td>
                      <td>
                        @if ($freelancer->status == 0)
                          <form id="disable-form-{{$freelancer->id}}" method="post" action="{{ route('admin.freelanceenable',$freelancer->id) }}" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to Enable This Freelancer ??'))
                            {
                              event.preventDefault();
                              document.getElementById('disable-form-{{$freelancer->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-success btn-block">Enable</a>
                        @else
                        <form id="disable-form-{{$freelancer->id}}" method="post" action="{{ route('admin.freelancedisable',$freelancer->id) }}" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to Disable This Freelancer ??'))
                            {
                              event.preventDefault();
                              document.getElementById('disable-form-{{$freelancer->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-primary btn-block">Disable</a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Reset Password</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Reset Passoword -->
   <div class="modal fade" id="reset-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form action="{{ route('admin.freelancers.reset-password','test') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="card-body">
                  <input type="hidden" name="freelancer_id" id="freelance_id" value="">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- Reset Passoword -->

@endsection

@section('footersection')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>
  $('#reset-password').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var password = button.data('mypassword') // Extract info from data-* attributes
  var confirm_password = button.data('myconfirm_password')
  var freelance_id = button.data('myfreelance_id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body #password').val(password);
  modal.find('.modal-body #confirm_password').val(confirm_password);
  modal.find('.modal-body #freelance_id').val(freelance_id);
})
</script>
@endsection