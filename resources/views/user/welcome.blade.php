<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Search with content</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start JS MAP --> <!-- End JS MAP --> <!-- Start custom styles --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{ asset('user/cache/css_01_home.min.css')}}"/>
   </head>
   <body>
      @include('user.layouts.header')
      <!-- ./ header --> 
      <div class="section section-flat-search container container-palette bg-mask">
         <div class="container">
            <div class="body">
               <div class="title">Get New Job. <b>Right Now.</b></div>
               <!-- ./ top search title --> 
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
               <div class="flat-search-notification">557 new jobs posted in the last 7 days</div>
            </div>
            <!-- ./ top search body --> 
         </div>
      </div>
      <!-- ./ top search --> 
      <div class="section our-works container container-palette" >
         {{-- <div class="container"> --}}
                     <h2 class="section-title text-success" style="text-decoration: underline;">Advert Placement</h2>
                     <div class="row">
                        <div class="col-md-11" style="background-image: url({{ asset('user/img/yougurt.jpg')}}); height: 250px; width: 100%; background-size: cover;"></div>
                        {{-- <div class="col-md-2">
                           <p class="text-justify">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                           </p>
                        </div> --}}
                     </div>
                  </div>
      {{-- </div> --}}
      <!-- ./ our works --> 
      <div class="section section-advice container container-palette bg-mask-light">
         <div class="container advice-container">
            <div class="body">
               <h2 class="title">Create Profile That Works</h2>
               <!-- ./ section title --> 
               <p class="description">Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam aliquam augue vitae nisi faucibus, utricies mtus accumsan. Broder eletum diam sit amet opus vulputate. Praesent fermentum, felis sit amet lobortis euismod, massa leo efficitur tortor, at lacinia mi orci eu purus.</p>
               <div class="advice-footer"> <a HREF="12_Submit_Resume.html" class="btn btn-default">Get Advice</a> </div>
            </div>
         </div>
      </div>
      <!-- ./ advice --> 
      <div class="section section-listings container container-palette section-job-area">
         <div class="container">
            <h2 class="section-title">New Jobs in Your Area</h2>
            <!-- ./ section title --> 
            <div class="wraper-row">
               <div class="column-content">
                  <div class="results-list">
                     <!-- ./ job purpose --> 
                  @foreach ($jobs as $job)
                     
                     <div class="item">
                        <div class="flex-row">
                           <div class="grid-content">
                              <h3 class="title text-color-secondary"><a HREF="{{ route('job', $job->slug) }}">{{ $job->job_title }}</a></h3>
                              <div class="options">Salary: <span class="option opt-price">#{{ $job->job_salary }}</span>  <span class="opt-light"><i class="icon_pin_alt"></i>{{ $job->job_location }}</span>  </div>
                           </div>
                           @if ($job->schedule == 'Full Time')
                           <div class="grid-side"><span class="item-label text-yellow"><i class="icon_ribbon_alt"></i>{{ $job->schedule }}</span></div>
                           @else
                           <div class="grid-side"><span class="item-label text-purple"><i class="icon_ribbon_alt"></i>{{ $job->schedule }}</span></div>
                           @endif
                        </div>
                     </div>

                  @endforeach
                     <!-- ./ job purpose --> 
                  </div>
                  <!-- ./ jobs list --> 
               </div>
               <div class="column-sidebar">
                  <div class="alert-item">
                     <div class="badget featured"><i class="icon_star"></i></div>
                     <div class="header">
                        <h2 class="title text-color-secondary">Uber Driver Partner</h2>
                     </div>
                     <div class="body">
                        <ul class="options-list">
                           <li class="opt">Uber</li>
                           <li class="opt"><i class="icon_currency"></i> an hour</li>
                           <li class="opt-light"><i class="icon_pin_alt"></i>Lagos</li>
                        </ul>
                     </div>
                     <div class="alert-footer"><a HREF="#" class="btn btn-custom btn-custom-secondary">Apply</a><a href="#" class="btn btn-clear btn-alert-clear text-red"><i class="icon_ribbon_alt"></i>Full Time</a></div>
                  </div>
                  <!-- ./ job box --> 
               </div>
               <!-- ./ sideber of section --> 
            </div>
         </div>
      </div>
      <!-- ./ jobs sections --> 
      <div class="section banner bg-color-primary container container-palette">
         <div class="container banner-container">
            <div class="banner-body">
               <h2 class="title">Add your resume and let your next job find you.</h2>
               <!-- ./ banner body --> 
            </div>
            <div class="banner-navigation"><a HREF="{{ route('job.resume') }}" class="btn btn-default">Add Your Resume</a></div>
            <!-- ./ banner link --> 
         </div>
      </div>
      <!-- ./ section banner --> 
      
      <!-- ./ section reviews --> 
      <div class="section section-articles container container-palette">
         <div class="container">
            <h2 class="section-title">Recent Articles</h2>
            <!-- ./ section title --> 
            <div class="row row-flex results-default">

               @foreach ($posts as $post)
               <div class="col-md-4">
                  <div class="thumbnail thumbnail-article">
                     <img SRC="{{Storage::disk('local')->url($post->image)}}" alt="" class="preview" /> 
                     <div class="body">
                        <div class="top">{{ $post->posted_by }} on {{ $post->created_at->diffForHumans() }}</div>
                        <h3 class="title"><a href="{{ route('article',$post->slug) }}">{{ $post->title }}</a> </h3>
                     </div>
                     <div class="footer"><a HREF="{{ route('article',$post->slug) }}" class="btn btn-more">Read More<i class="arrow_carrot-right"></i></a></div>
                  </div>
               </div>
               @endforeach
               
               <!-- ./ one article --> 
            </div>
            <!-- ./ articles grid --> 
         </div>
      </div>
      <!-- ./ section recent articles --> 
         @include('user.layouts.footer')
      <!-- ./ footer --> 
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start JS MAP --> <script src="http://127.0.0.1:8081/35FA31DC.001/maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;key=AIzaSyDdJRYhQrBG1X_ykF6JlhwK1XeNaGRHrCI"></script> <!-- End JS MAP --> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{ asset('user/cache/js_01_home.min.js')}}"></script> 
   </body>