<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from 127.0.0.1:8081/35FA31DC.001/listing-themes.com/jobworld-html/11_Job_Preview.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jul 2018 11:59:48 GMT -->
   <head>
      <meta charset="UTF-8" />
      <title>Job Preview</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{ asset('user/cache/css_11_job_preview.min.css')}}"/>
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ header --> 
      <div class="section-page-title container container-palette"  style="background-image: url({{ asset('user/img/pic/advices/advice_3.jpg')}});">
         <div class="container">
            <h2 class="title" style="color: white;">Job Preview</h2>
         </div>
      </div>
      <main class="container container-palette pt-55">
         <div class="container">
            <div class="widget widget-jpreview pb-0 m95">
               <div class="jpreview-card">
                  <div class="jpreview-header">
                     <h2 class="title">Preview</h2>
                     <div class="side"> <a href="{{ url()->previous() }}" class="btn btn-custom btn-custom-default-secondary">Back</a> 
                     <a href="{{ route('job.apply', $job->id) }}" class="btn btn-custom btn-custom-secondary" onclick="event.preventDefault();
                                                     document.getElementById('job-apply').submit();">Apply Now</a> 
                        <form id="job-apply" action="{{ route('job.apply', $job->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                  </div>
                  </div>
                  <div class="jpreview-caption">
                     <div class="thumbnail border"><a HREF="14_Company_Profile.html"><img SRC="{{asset('user/img/pic/loglo-company.png')}}" alt="" /></a></div>
                     <div class="body">
                        <h3 class="title">{{ $job->job_title }}</h3>
                        <div class="options">  <span class="opt"><i class="icon_currency"></i>{{ $job->job_salary }} a year</span>  <span class="opt-light"><i class="icon_pin_alt"></i>{{ $job->job_location }}</span> </div>
                        <div class="subtext"><i>at</i> <a HREF="14_Company_Profile.html" class="text-color-primary"><b>
                           @foreach ($job->employers as $employer)
                                {{ $employer->company_name }}
                           @endforeach
                        </b></a></div>
                     </div>
                  </div>
               </div>
               <div class="jpreview-body wraper-row">
                  <div class="column-content widget-rsm">
                     <div class="rsm-sub-box">
                        <h4 class="title">Salary</h4>
                        <div class="decription">
                           @if ($job->negotiable == 1)
                              Negotiable
                           @else
                              Non-Negotiable
                           @endif
                        </div>
                     </div>
                     <div class="rsm-sub-box">
                        <h4 class="title">About Job</h4>
                        <div class="decription">
                           {!! htmlspecialchars_decode($job->job_description) !!}
                        </div>
                     </div>
                  </div>
                  <div class="column-sidebar">
                     <div class="widget widget-jsummary pl">
                        <div class="widget-header">
                           <h2 class="title text-color-primary">Job summary</h2>
                        </div>
                        <ul class="joptions-list">
                           <li class="opt">
                              @foreach ($job->employers as $employer)
                                   {{ $employer->company_name }}
                              @endforeach
                           </li>
                           <li class="opt"><i class="icon_currency"></i>{{ $job->job_salary }} a year</li>
                           <li class="opt-light"><i class="icon_pin_alt"></i>{{ $job->job_location }}</li>
                        </ul>
                        <dl class="joptions-dl">
                           <dt>Industries</dt>
                              @foreach ($job->categories as $category)
                                <dd>{{ $category->name }}</dd>
                              @endforeach
                           <dt>Education level</dt>
                           <dd>{{ $job->education_level }}</dd>
                           <dt>Contact</dt>
                           @foreach ($job->employers as $employer)
                              <dd>{{ $employer->name .' '.$employer->lastname }}  (<i>{{ $employer->email}}</i>)</dd>
                           @endforeach
                           
                        </dl>
                        <div>  <a href="#" class="btn btn-clear text-red"><i class="icon_ribbon_alt"></i>{{ $job->schedule }}</a> </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ./ job preview --> 
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
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles -->
      <script src="{{ asset('user/cache/js_11_job_preview.min.js')}}"></script> 
   </body>
</html>