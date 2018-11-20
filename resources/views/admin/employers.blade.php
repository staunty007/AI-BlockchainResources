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
            <h1>Show Employers</h1>
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
                  <th>Company Name</th>
                  <th>Company Email</th>
                  <th>Preview</th>
                  <th>Reset Password</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($employers as $employer)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $employer->name .' '. $employer->lastname}}</td>
                      <td><a href="{{ route('admin.employers.employerinfo',$employer->id) }}">{{ $employer->company_name }}</a></td>
                      <td>{{ $employer->email }}</td>
                      <td>
                        <button type="button" class="btn btn-default btn-block"  
                        data-myname="{{ $employer->name .' '. $employer->lastname}}" 
                        data-myemail="{{ $employer->email }}" 
                        data-mycompany_name="{{ $employer->company_name }}" 
                        data-mycompany_description="{{ $employer->company_description }}" 
                        data-mycompany_location="{{ $employer->company_location }}" 
                        data-mycompany_industry="{{ $employer->comapny_industry }}"
                        data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-eye"></i>  Preview</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-warning btn-block" data-mypassword="" data-myconfirm_password="" data-myemploy_id="{{$employer->id}}" data-toggle="modal" data-target="#reset-password">
                          Reset
                        </button>
                      </td>
                      <td>
                        @if ($employer->status == 0)
                          <form id="disable-form-{{$employer->id}}" method="post" action="{{ route('admin.employerenable',$employer->id) }}" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to Enable This employer ??'))
                            {
                              event.preventDefault();
                              document.getElementById('disable-form-{{$employer->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-success btn-block">Enable</a>
                        @else
                        <form id="disable-form-{{$employer->id}}" method="post" action="{{ route('admin.employerdisable',$employer->id) }}" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to Disable This employer ??'))
                            {
                              event.preventDefault();
                              document.getElementById('disable-form-{{$employer->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-primary btn-block">Disable</a>
                        @endif
                      </td>
                    </tr>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Company Name</th>
                  <th>Company Email</th>
                  <th>Preview</th>
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

  <div class="modal fade" id="modal-default" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 style="font-weight: bolder;" class="modal-title text-primary"></h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="https://www.qualiscare.com/wp-content/uploads/2017/08/default-user.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username" id="company_name"></h3>
                <h5 class="widget-user-desc" id="email"></h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link text-info">
                      Full Name <span class="float-right text-primary" id="name"></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link text-info">
                      Location <span class="float-right text-primary" id="company_location"></span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link text-info">
                      Industry <span class="float-right text-primary" id="company_industry"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Preview -->

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
           <form action="{{ route('admin.employers.reset-password','test') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="card-body">
                  <input type="hidden" name="employer_id" id="employ_id" value="">
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
  $('#modal-default').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('myname') // Extract info from data-* attributes
    var email = button.data('myemail')
    var company_name = button.data('mycompany_name')
    var company_description = button.data('mycompany_description')
    var company_location = button.data('mycompany_location')
    var company_industry = button.data('mycompany_industry')
    //var resume = e.relatedTarget.dataset['url']
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #name').text(name);
    modal.find('.modal-body #email').text(email);
    modal.find('.modal-body #company_name').text(company_name);
    modal.find('.modal-body #company_description').text(company_description);
    modal.find('.modal-body #company_location').text(company_location);
    modal.find('.modal-body #company_industry').text(company_industry);
    //modal.find('.modal-body #title').val(title);
  })
</script>

<script>
  $('#reset-password').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var password = button.data('mypassword') // Extract info from data-* attributes
  var confirm_password = button.data('myconfirm_password')
  var employ_id = button.data('myemploy_id')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body #password').val(password);
  modal.find('.modal-body #confirm_password').val(confirm_password);
  modal.find('.modal-body #employ_id').val(employ_id);
})
</script>

@endsection