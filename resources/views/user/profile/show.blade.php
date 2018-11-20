<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Employee profile</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{asset('user/cache/css_07_jobs_search.min.css')}}"/>
   </head>
   <body>
      <header>
         <div class="nav-bar container container-palette">
            <div class="wide-container">
               <div class="flex-row">
                  <div class="grid logo-container">
                     <div class="logo"><a HREF="01_Home.html"><b class="text-color-primary">Job</b>World</a></div>
                  </div>
                  <!-- ./ logo --> 
                  <div class="grid nav-menu">
                     <nav class="navbar navbar-expand-sm navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">  <span class="navbar-toggler-icon"></span> </button> 
                        <div class="collapse navbar-collapse default-menu-collapse" id="main-menu">
                           <button class="navbar-toggler mobile-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">  <i class="icon_close_alt2"></i>  </button>  
                           <ul class="nav navbar-nav collapse navbar-collapse default-menu" id="navbarNavDropdown">
                              <li class="nav-item dropdown active">
                                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  Homepage  </a>  
                                 <div class="dropdown-menu">  <a class="dropdown-item" HREF="01_Home.html">Search with content</a>  <a class="dropdown-item" HREF="04_Home.html">Search with results</a>  <a class="dropdown-item active" HREF="07_Jobs_Search.html">Search with filtering</a>  <a class="dropdown-item" HREF="15_Categories_Detailed.html">Categories</a>  </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  Map examples  </a>  
                                 <div class="dropdown-menu">  <a class="dropdown-item" HREF="02_Home.html">Map Job Search</a>  <a class="dropdown-item" HREF="05_Finding_Candidates.html">Map with filtering</a>  <a class="dropdown-item" HREF="08_Jobs_Search_With_Map.html">Map with Results</a>  <a class="dropdown-item" HREF="03_Home.html">Search with geo map</a>  </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  About us  </a>  
                                 <div class="dropdown-menu">  <a class="dropdown-item" HREF="14_Company_Profile.html">Company profile</a>  <a class="dropdown-item" HREF="19_Pricing.html">Pricing</a>  <a class="dropdown-item" HREF="16_Blog_Grid.html">Blog Grid</a>  <a class="dropdown-item" HREF="17_Blog_Large.html">Blog Large</a>  <a class="dropdown-item" HREF="18_Blog_Open.html">Blog Open</a>  <a class="dropdown-item" HREF="20_Contact.html">Contact</a>  <a class="dropdown-item" HREF="21_Sign_Up.html">Register</a>  <a class="dropdown-item" HREF="22_Log_In.html">Sign In</a>  </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  Pages  </a>  
                                 <div class="dropdown-menu">  <a class="dropdown-item" HREF="06_Employee_Profile.html">Employee profile</a>  <a class="dropdown-item" HREF="10_Post_A_Job.html">Post A Job</a>  <a class="dropdown-item" HREF="09_Job_Open.html">Job Open</a>  <a class="dropdown-item" HREF="11_Job_Preview.html">Job Preview</a>  <a class="dropdown-item" HREF="12_Submit_Resume.html">Submit Resume</a>  <a class="dropdown-item" HREF="13_Saved.html">Saved Employee</a>  </div>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <!-- ./ main menu --> 
                  <div class="grid quick-navigation">  <a HREF="#" class="btn btn-clear"><i class="icon_profile"></i>Welcome. {{ ucfirst(Auth::user()->name) }}</a></div>
                  <!-- ./ actions panel --> 
               </div>
            </div>
         </div>
         <!-- ./ navigation bar --> 
      </header>
      <!-- ./ header --> 
      <div class="section section-top-search container-palette" style="background-image: url({{ asset('user/img/pic/advices/advice_9.jpg')}});">
         <div class="container">
            <div class="body">
               <div class="job-form">
                  <form action="#" class="flex-row">
                     <div class="form-group"> <label for="tops_keywords" class="control-label text-color-secondary">what</label> <input name="keywords" id="tops_keywords" type="text" class="form-control" placeholder="Keywords" /> </div>
                     <div class="form-group">
                        <label for="tops_location" class="control-label text-color-secondary">where</label> 
                        <div class="form-group-location">  <input name="location" id="tops_location" type="text" class="form-control locationautocomplete" placeholder="Location" />  <i class="fa fa-crosshairs" aria-hidden="true"></i> </div>
                     </div>
                     <div class="form-group">
                        <label for="search_types_option" class="control-label text-color-secondary"></label> 
                        <select class="form-control selectpicker" name="search_types" id="search_types_option" title="Category">
                           <option value="a" data-icon="ion-arrow-graph-up-right">Trending</option>
                           <option value="restaurants" data-icon="ion-android-restaurant">Restaurants</option>
                           <option value="coffe" data-icon="ion-coffee">Coffee</option>
                           <option value="nightlife" data-icon="ion-android-bar">Nightlife</option>
                           <option value="shopping" data-icon="ion-bag">Shopping</option>
                        </select>
                     </div>
                     <a HREF="07_Jobs_Search.html" class="btn btn-flat-search">Search</a> 
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
                     <a HREF="11_Job_Preview.html" class="btn btn-custom btn-custom-secondary text-left">Add Resume</a> <a HREF="13_Saved.html" class="btn btn-custom btn-custom-default text-left">Save and Applied Jobs</a><a HREF="13_Saved.html" class="btn btn-custom btn-custom-default text-left">My Profile</a> </div>
                  </div>
                  <!-- ./widget call --> 
               </div>
               <!-- ./ sidebar --> 
               <div class="column-content results-listings-ext">
                  <div class="results-list middle m95">
                     <div class="alert-item">
                     <div class="badget featured"><i class="icon_star"></i></div>
                     <div class="item-listings-ext">
                        <div class="header">
                           <div class="content">
                              {{-- @foreach ($users as $user) --}}
                              <div class="preview"><a HREF="06_Employee_Profile.html"><img SRC="{{asset('user/img/pic/users/rewiever-c.jpg')}}" alt="" /></a></div>
                              <div class="caption">
                                 <h3 class="title"><a HREF="06_Employee_Profile.html">{{ Auth::User()->name .' '. Auth::User()->lastname }}</a></h3>
                                 <div class="options">  <span class="opt">{{ Auth::User()->current_job }}</span>  <span class="opt-light"><i class="icon_pin_alt"></i>{{ Auth::User()->state }}</span>  </div>
                              </div>
                           </div>
                           <div class="item-label"><a href="{{ route('user.profile.edit',Auth::User()->id) }}" class="text-red" >Update Profile</a></div>
                           {{-- @endforeach --}}
                        </div>
                        <div class="body">
                           <p>Institution - {{ Auth::User()->school }}</p>
                           <p>Graduation Year - {{ Auth::User()->grad_year }}</p>
                           <p>Desired Job - {{ Auth::User()->desired_job }}</p>
                           <p>Working Experience - {{ Auth::User()->working_exp }} Years</p>
                        </div>
                        <div class="footer"></div>
                     </div>
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
      <footer class="footer container container-palette">
         <div class="footer-top">
            <div class="container">
               <div class="row row-flex">
                  <div class="col-md-3">
                     <div class="f_widget widget-about">
                        <h2 class="title">Abut Jobworld</h2>
                        <!-- ./ widget title -->  
                        <div class="body">Aliquam sed est in lorem luctus hendrit. Nulla in posuere neque. Nam lectus risus, pellentesque at nulla vitae, mauris raesent pulvinar.</div>
                        <!-- ./ widget body --> 
                     </div>
                     <!-- ./ widget about --> 
                  </div>
                  <div class="col-md-3">
                     <div class="f_widget widget-navigation">
                        <h2 class="title">For Job Seekers</h2>
                        <!-- ./ widget title -->  
                        <div class="body">
                           <ul class="list-f-nav">
                              <li><a HREF="07_Jobs_Search.html"><i class="arrow_carrot-right_alt2"></i>Find Jobs</a></li>
                              <li><a HREF="12_Submit_Resume.html"><i class="arrow_carrot-right_alt2"></i>Submit Resume</a></li>
                              <li><a HREF="13_Saved.html"><i class="arrow_carrot-right_alt2"></i>Saved Jobs</a></li>
                              <li><a HREF="20_Contact.html"><i class="arrow_carrot-right_alt2"></i>Help</a></li>
                           </ul>
                        </div>
                        <!-- ./ widget body --> 
                     </div>
                  </div>
                  <!-- ./ widget navigation --> 
                  <div class="col-md-3">
                     <div class="f_widget widget-contact">
                        <h2 class="title">Contact Us</h2>
                        <!-- ./ widget title -->  
                        <div class="body">  768 5th Ave, New York, NY 10019, USA <br />  +1 212-759-3000<br />  helpme@example.com </div>
                        <!-- ./ widget body --> 
                     </div>
                     <!-- ./ widget contact --> 
                  </div>
                  <div class="col-md-3">
                     <div class="f_widget widget-subscribe">
                        <h2 class="title">Newsletter</h2>
                        <!-- ./ widget title -->  
                        <div class="body">
                           <form action="#">
                              <div class="form-group-subscribe">  <button type="submit" class="btn btn-subscribe btn-custom btn-custom-secondary"><i class="icon_mail_alt"></i></button>  <input name="mail" type="email" class="form-control" placeholder="Enter Your Email" />  </div>
                           </form>
                        </div>
                        <!-- ./ widget body --> 
                     </div>
                     <!-- ./ widget subscribe --> 
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="flex-row">
                  <div class="right"><span class="copyright">Copyright © 2017 - Jobworld</span></div>
                  <!-- ./ copyright --> 
                  <div class="left">
                     <ul class="list-social">
                        <li><a href="#"><i class="social_instagram"></i></a></li>
                        <li><a href="#"><i class="social_twitter"></i></a></li>
                        <li><a href="#"><i class="social_pinterest"></i></a></li>
                        <li><a href="#"><i class="social_facebook"></i></a></li>
                        <li><a href="#"><i class="social_youtube"></i></a></li>
                        <li><a href="#"><i class="social_rss"></i></a></li>
                     </ul>
                     <!-- ./ social links --> 
                  </div>
               </div>
            </div>
         </div>
         <!-- ./ footer-bottom --> 
      </footer>
      <!-- ./ footer --> 
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <script src="http://127.0.0.1:8081/35FA31DC.001/maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;key=AIzaSyDdJRYhQrBG1X_ykF6JlhwK1XeNaGRHrCI"></script> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{asset('user/cache/js_07_jobs_search.min.js')}}"></script> 
   </body>
</html>