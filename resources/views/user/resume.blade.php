<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from 127.0.0.1:8081/35FA31DC.001/listing-themes.com/jobworld-html/10_Post_A_Job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jul 2018 11:59:35 GMT -->
   <head>
      <meta charset="UTF-8" />
      <title>Job Preview</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{asset('user/cache/css_10_post_a_job.min.css')}}"/>
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ header --> 
      <main class="container container-palette">
         <div class="container">
            <div class="widget widget-submit">
               <div class="widget-header header-styles">
                  <h2 class="title">Add New Resume</h2>
               </div>
               @include('includes.flash-message')
               <!-- ./ title --> 
               <form action="{{ route('job.resume') }}" class="job-form default jborder" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                  <label for="s_comp_name" class="control-label">Desired Job Title</label>
                   <input type="text" name="desired_job" id="s_comp_name" class="form-control" /> </div>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="">
                        <input type="file" name="resume" id="s_image" class="form-control-file" />
                      </div>

                         {{-- <span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span> --}}
                  {{-- <div class="file_upload">
                     <input type="file" name="resume" id="s_image" class="form-control-file" />

                     <input type="file" name="resume" id="s_image" class="form-control-file" />
                         <span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span>
                    <label for="s_image" class="btn btn-custom btn-custom-default">Upload Resume</label>
                  </div> --}}
                    </li>
                    <li class="list-group-item text-success">Copy and Paste Resume</li>
                    <li class="list-group-item text-success">Add From Dropbox</li>
                </ul>
                <br>
               <div class="form-actions">
                  <button type="submit" class="btn btn-custom btn-custom-secondary">Submit your Resume</button></div>
               </form>
            </div>
            <!-- ./widge submit --> 
         </div>
      </main>
      <div class="section section banner bg-color-primary container container-palette">
         <div class="container banner-container">
            <div class="banner-body">
               <h2 class="title">We Are Ready To Help You Anytime</h2>
               <!-- ./ banner body --> 
            </div>
            <div class="banner-navigation"><a HREF="20_Contact.html" class="btn btn-default">Contact Support</a></div>
            <!-- ./ banner link --> 
         </div>
      </div>
      <!-- ./ section banner --> 
      @include('user.layouts.footer')
      <!-- ./ footer --> 
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{asset('user/cache/js_10_post_a_job.min.js')}}"></script> 
   </body>
</html>