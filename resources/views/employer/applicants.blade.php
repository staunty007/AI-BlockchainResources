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
                  <h3 class="card-title">View Applicants</h3>
                </div>
                <div class="col-md-4">

                  {{-- <a href="{{ route('job.create') }}" class="btn btn-success pull-right">Add New Job</a> --}}
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Applicant Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Location</th>
                  <th>School</th>
                  <th>Degree</th>
                  <th>View Resume</th>
                  <th>Verified</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($appliers as $applier)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $applier->name .' '. $applier->lastname }}</td>
                      <td>{{ $applier->email }}</td>
                      <td>{{ $applier->gender }}</td>
                      <td>{{ $applier->state }}</td>
                      <td>{{ $applier->school }}</td>
                      <td>{{ $applier->degree }}</td>
                      <td><a href="/myresume/{{ $applier->resume }}" class="btn btn-success btn-block">View</a></td>
                      <td><a href="#" class="btn btn-info btn-block">Check</a></td>
                      {{-- <td>
                            <a href="{{ route('job.edit',$job->id) }}" class="btn btn-primary btn-block">Edit</a>
                      </td> --}}
                      {{-- <td>
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
                      </td> --}}
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Applicant Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Location</th>
                  <th>School</th>
                  <th>Degree</th>
                  <th>View Resume</th>
                  <th>Verified</th>
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