@extends('freelance.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Titles</h3>
              </div>
              @include('includes.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
              <div class="row">
                
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="subtitle">Article Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                          </div>
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group" style="margin-top: 14px;">
                    <label>Select Tags</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;" name="tags[]">
                     @foreach ($tags as $tag)
                       <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                     @endforeach
                    </select>
                  </div>
                </div>

          </div> <!-- /.row -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="ckeditor" placeholder="Place some text here" name="body" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
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
@section('footersection')
<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
@endsection