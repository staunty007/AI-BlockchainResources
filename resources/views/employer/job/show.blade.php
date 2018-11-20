@extends('employer.layouts.app')
@section('headsection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <div class="card">
            <div class="card-header">
             <div class="row">
                <div class="col-md-8">
                  <h3 class="card-title">View Jobs</h3>
                </div>
                <div class="col-md-4">

                  {{-- @can('posts.create', Auth::user()) --}}
                  <a href="{{ route('job.create') }}" class="btn btn-success pull-right">Add New Job</a>
                  {{-- @endcan
 --}}
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Job Title</th>
                  <th>Job Location</th>
                  <th>Education Level</th>
                  <th>Schedule</th>
                  {{-- @can('post.update', Auth::user()) --}}
                      <th>Edit</th>
                  {{-- @endcan --}}
                  {{-- @can('post.delete', Auth::user()) --}}
                      <th>Delete</th>
                  {{-- @endcan --}}
                </tr>
                </thead>
                <tbody>
                  @foreach($jobs as $job)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td><a href="{{ route('employer.applicants',$job->slug) }}">{{ $job->job_title }}</a></td>
                      <td>{{ $job->job_location }}</td>
                      <td>{{ $job->education_level }}</td>
                      <td>{{ $job->schedule }}</td>
                      <td>
                        {{-- @can('posts.update', Auth::user()) --}}
                            <a href="{{ route('job.edit',$job->id) }}" class="btn btn-primary btn-block">Edit</a>
                        {{-- @endcan --}} 
                      </td>
                      <td>
                        {{-- @can('posts.delete', Auth::user()) --}}
                            <form id="delete-form-{{$job->id}}" method="post" action="{{ route('job.destroy',$job->id) }}" style="display: none;">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to delete ??'))
                            {
                              event.preventDefault();
                              document.getElementById('delete-form-{{$job->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-danger btn-block">Delete</a>
                        {{-- @endcan --}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Job Title</th>
                  <th>Job Location</th>
                  <th>Education Level</th>
                  <th>Schedule</th>
                  {{-- @can('posts.update', Auth::user()) --}}
                      <th>Edit</th>
                  {{-- @endcan --}}
                  {{-- @can('posts.delete', Auth::user()) --}}
                      <th>Delete</th>
                  {{-- @endcan --}}
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