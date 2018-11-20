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

    <!-- Main content -->
    <section class="content">

      <div class="card">
            <div class="card-header">
             <div class="row">
                <div class="col-md-8">
                  <h3 class="card-title">View Posts</h3>
                </div>
                <div class="col-md-4">
                  <a href="{{ route('post.create') }}" class="btn btn-success pull-right">Post New Article</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>created_at</th>
                  <th>Preview</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>{{ $post->created_at->diffForHumans() }}</td>
                      <td>
                        <button type="button" class="btn btn-default"  data-mytitle="{{$post->title}}" data-mybody="{{$post->body}}" data-myauthor="{{$post->posted_by}}" data-toggle="modal" data-target="#modal-default">
                        Preview</button>
                      </td>
                      <td>
                        @if ($post->status == 0)
                          <form id="disable-form-{{$post->id}}" method="post" action="{{ route('admin.publish_post',$post->id) }}" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to Publish This post ??'))
                            {
                              event.preventDefault();
                              document.getElementById('disable-form-{{$post->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-success btn-block">Publish</a>
                        @else
                        <form id="disable-form-{{$post->id}}" method="post" action="{{ route('admin.unpublish_post',$post->id) }}" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                        <a href="" onclick="
                          if(confirm('Are you sure, You want to Unpublish This post ??'))
                            {
                              event.preventDefault();
                              document.getElementById('disable-form-{{$post->id}}').submit();
                            }
                          else
                            {
                              event.preventDefault();
                            }" class="btn btn-primary btn-block">Unpublish</a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>created_at</th>
                  <th>Preview</th>
                  <th>Status</th>
                </tr>
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
          <h5 class="modal-title text-primary"></h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <p id="body"></p>
              <span class="text-info">Posted By: <p id="author"></p></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
    var title = button.data('mytitle') // Extract info from data-* attributes
    var body = button.data('mybody')
    var author = button.data('myauthor')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.modal-body #body').html(body).text();
    modal.find('.modal-body #author').text(author);
    //modal.find('.modal-body #title').val(title);
  })
</script>
@endsection