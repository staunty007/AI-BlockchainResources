<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Applicant DashBoard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{asset('user/cache/css_07_jobs_search.min.css')}}"/>
   </head>
   <body>
      @include('user.layouts.header')
      <!-- ./ header --> 
      <div class="section section-top-search container-palette" style="background-image: url({{ asset('user/img/pic/advices/advice_9.jpg')}});">
         <div class="container">
            <div class="body">
               <div class="job-form">
                  <form action="{{ route('jobs') }}" class="flex-row">
                     <div class="form-group"> <label for="tops_keywords" class="control-label text-color-secondary">what</label> <input name="job_title" id="tops_keywords" type="text" class="form-control" placeholder="Job Title" /> </div>
                     <div class="form-group">
                        <label for="tops_location" class="control-label text-color-secondary">where</label> 
                        <div class="form-group-location">  <input name="job_location" id="tops_location" type="text" class="form-control locationautocomplete" placeholder="Location" />  <i class="fa fa-crosshairs" aria-hidden="true"></i> </div>
                     </div>
                     <div class="form-group">
                        <label for="search_types_option" class="control-label text-color-secondary"></label> 
                        <select class="form-control selectpicker" name="search_types" id="search_types_option" title="Category">
                        {{-- @foreach ($categories as $category)
                        <option value="{{ $category->name }}" data-icon="ion-bag">{{ $category->name }}</option>
                        @endforeach --}}
                        </select>
                     </div>
                     <input type="submit" class="btn btn-flat-search" value="Search">
                     {{-- <a HREF="07_Jobs_Search.html" class="btn btn-flat-search">Search</a> --}} 
                  </form>
               </div>
            </div>
            <!-- ./ top search body --> 
         </div>
      </div>
      <!-- ./ top search --> 
      <main class="container container-palette pt-75">
         <div class="container">
            <div class="wraper-row">
               <div class="column-sidebar">
                  <!-- ./ widget social links--> 
                  <div class="widget widget-contact">
                     <div class="actions">
                     <a HREF="{{ route('job.resume') }}" class="btn btn-custom btn-custom-secondary text-left">Add Resume</a> <a HREF="{{ route('user.profile.show') }}" class="btn btn-custom btn-custom-default text-left">My Profile</a><a HREF="{{ route('logout') }}" class="btn btn-custom btn-custom-default text-left"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a></div>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                     </form>
                  </div>
                  <!-- ./widget call --> 
               </div>
               <!-- ./ sidebar --> 
               <div class="column-content results-listings-ext">
                  <div class="results-list middle m95">
                     <div class="alert-item">
                     <div class="badget featured"><i class="icon_star"></i></div>
                     <div class="header">
                        <h2 class="title text-color-secondary">Is your salary keeping up with your career?</h2>
                     </div>
                     <div class="body">
                        <ul class="options-list">
                           <li class="opt">Find out what you could be earning with My Career Path.</li>
                        </ul>
                     </div>
                     <div class="alert-footer"><a HREF="{{ route('jobs') }}" class="btn btn-custom btn-custom-secondary">See Latest Jobs &nbsp; <i class="icon_search"></i></a></div>
                     <br>
                     <div class="alert-footer"><a HREF="#" class="btn btn-custom btn-custom-primary">Explore Carriers &nbsp; <i class="icon_globe-2"></i></a></div>
                  </div>
                  <!-- ./ job box --> 
               </div>
               <!-- ./content --> 
            </div>
            {{-- <div class="div section-80 m95 section-get-started container container-palette">
                <div class="container">
                  <div class="started-body">
                  <p> To start getting recommendations, <a HREF="12_Submit_Resume.html">upload a resume</a> or complete a job application. </p>
                  </div>
               </div>
            </div> --}}
         </div>
      </main>
      @include('user.layouts.footer')
      <!-- ./ footer --> 
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <script src="http://127.0.0.1:8081/35FA31DC.001/maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;key=AIzaSyDdJRYhQrBG1X_ykF6JlhwK1XeNaGRHrCI"></script> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{asset('user/cache/js_07_jobs_search.min.js')}}"></script> 
   </body>
</html>