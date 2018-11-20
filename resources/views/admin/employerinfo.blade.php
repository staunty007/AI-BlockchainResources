@extends('admin.layouts.app')
@section('headsection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="row">
                <div class="col-md-3">
                  <!-- Widget: user widget style 2 -->
                  <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-warning">
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="https://www.qualiscare.com/wp-content/uploads/2017/08/default-user.png" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                     {{--  @foreach ($employers as $employer) --}}
                      
                      <h3 class="widget-user-username">{{ $employers->company_name }}</h3>
                      
                      <h5 class="widget-user-desc">{{ $employers->name .' '. $employers->lastname }}</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Location <span class="float-right badge bg-primary">{{ $employers->company_location }}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Jobs Listings <span class="float-right badge bg-info">{{ $jobs->count() }}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Applicants <span class="float-right badge bg-success">12</span>
                          </a>
                        </li>
                        {{-- <li class="nav-item">
                          <a href="#" class="nav-link">
                            Followers <span class="float-right badge bg-danger">842</span>
                          </a>
                        </li> --}}
                      </ul>
                    </div>
                  </div>
                  {{-- @endforeach --}}
                  <!-- /.widget-user -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">
                  <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Job Listings</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Job Title</th>
                              <th>Location</th>
                              <th>Schedule</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($jobs as $job)
                                <tr>
                                  <td>{{ $loop->index + 1 }}</td>
                                  <td><a href="{{ route('admin.employer.applicants',$job->slug) }}">{{ $job->job_title}}</a></td>
                                  <td>{{ $job->job_location}}</td>
                                  <td>{{ $job->schedule}}</td>
                                  
                                </tr>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                               <th>S.No</th>
                              <th>Job Title</th>
                              <th>Location</th>
                              <th>Schedule</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
                
                
              </div>
              <!-- /.row -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
@endsection