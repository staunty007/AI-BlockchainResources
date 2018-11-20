<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from 127.0.0.1:8081/35FA31DC.001/listing-themes.com/jobworld-html/05_Finding_Candidates.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jul 2018 11:56:23 GMT -->
   <head>
      <meta charset="UTF-8" />
      <title>Available Jobs</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- Start JS MAP --> <!-- End JS MAP --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{asset('user/cache/css_05_finding_candidates.min.css')}}"/>
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ header --> 
      <div class="widget-mapsearch container container-palette">
         <div style="margin-top:50px;" id="main-map_images-template"></div>
         <div class="container">
            <div class="search-overflow">
               <form action="{{ route('jobs') }}" class="flex-row job-form" method="GET">
                  <div class="form-group"> <input name="job_title" id="tops_keywords" type="text" class="form-control" placeholder="Job Title" /> </div>
                  <div class="form-group">
                     <div class="form-group-location"> <input name="job_location" id="tops_location" type="text" class="form-control locationautocomplete" placeholder="Location" /> <i class="fa fa-crosshairs" aria-hidden="true"></i> </div>
                  </div>
                  <div class="form-group">
                     <select class="form-control selectpicker" name="cate" id="search_types_option" title="Category">
                        @foreach ($categories as $category)
                        <option value="{{ $category->name }}" data-icon="ion-bag">{{ $category->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group-btn"> 
                     <input type="submit" class="btn btn-flat-search" value="Search">
                     {{-- <a HREF="07_Jobs_Search.html" class="btn btn-flat-search">Search</a>  --}}
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- ./ search with map --> 
      <main class="container container-palette">
         <div class="container">
            <div class="wraper-row">
               <div class="column-sidebar">
                  <div class="widget">
                     <div class="widget-header">
                        <h2 class="title">Companies</h2>
                     </div>
                     <ul class="widget-list">
                        @foreach ($companies as $company)
                        <li><a href="#">{{ $company->company_name }}</a></li>
                        @endforeach
                     </ul>
                  </div>
                  <!-- ./ widget -->  
                  <div class="widget">
                     <div class="widget-header">
                        <h2 class="title">Years of Work Experience</h2>
                     </div>
                     <ul class="widget-list">
                        <li><input type="checkbox" name="y_1" id="y_1" /><label for="y_1">Less than 1 year</label></li>
                        <li><input type="checkbox" name="y_2" id="y_2" /><label for="y_2">1-2 years</label></li>
                        <li><input type="checkbox" name="y_3" id="y_3" /><label for="y_3">3-5 years</label></li>
                        <li><input type="checkbox" name="y_4" id="y_4" /><label for="y_4">More than 6 years</label></li>
                     </ul>
                  </div>
                  <!-- ./ widget --> 
                  <div class="widget">
                     <div class="widget-header">
                        <h2 class="title">Industry</h2>
                     </div>
                     <ul class="widget-list">
                        @foreach ($categories as $category)
                        <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                     </ul>
                  </div>
                  <!-- ./ widget --> 
               </div>
               <!-- ./ sidebar --> 
               <div class="column-content results-listings-ext first-nopadding m65">
                  @foreach ($jobs as $job)
                  
                  <div class="item-listings-ext">
                     <div class="header">
                        <div class="content">
                           <div class="preview"><a HREF="{{ route('job', $job->slug) }}"><img SRC="{{asset('user/img/pic/users/rewiever-c.jpg')}}" alt="" /></a></div>
                           <div class="caption">
                              <h3 class="title"><a HREF="{{ route('job', $job->slug) }}">
                                 {{ $job->job_title }}</a></h3>
                              <div class="options">  <span class="opt">
                                 @foreach ($job->employers as $employer)
                                      {{ $employer->company_name }}
                                 @endforeach
                              </span>  <span class="opt-light"><i class="icon_pin_alt"></i>{{ $job->job_location }}</span>  </div>
                           </div>
                        </div>
                        <div class="item-label"><a href="#" class="text-default" >
                           @if ($job->status == 1)
                              <i>{{ $job->created_at->diffForHumans() }}</i>
                           @else
                              Expired
                           @endif
                        </a></div>
                     </div>
                     <div class="body">
                        <p>Department - 
                           @foreach ($job->categories as $category)
                           {{ $category->name }}
                           @endforeach
                        </p>
                        <a href="" class="btn btn-clear text-red"><i class="icon_ribbon_alt"></i>{{ $job->schedule }}</a>
                     </div>
                     <div class="footer">{!! htmlspecialchars_decode(str_limit($job->job_description, 230)) !!}</div>
                  </div>

                  @endforeach
               </div>
               <!-- ./ results big --> 
            </div>
         </div>
      </main>

      @include('user.layouts.footer')
      
      <!-- ./ footer --> 
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start JS MAP --> <script src="http://127.0.0.1:8081/35FA31DC.001/maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;key=AIzaSyDdJRYhQrBG1X_ykF6JlhwK1XeNaGRHrCI"></script> <!-- End JS MAP --> <script src="http://127.0.0.1:8081/35FA31DC.001/maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;key=AIzaSyDdJRYhQrBG1X_ykF6JlhwK1XeNaGRHrCI"></script> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{asset('user/cache/js_05_finding_candidates.min.js')}}"></script> 
   </body>
</html>