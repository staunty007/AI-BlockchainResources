<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from 127.0.0.1:8081/35FA31DC.001/listing-themes.com/jobworld-html/18_Blog_Open.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jul 2018 11:58:39 GMT -->
   <head>
      <meta charset="UTF-8" />
      <title>Blog Open</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{asset('user/cache/css_18_blog_open.min.css')}}"/>
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ header --> 
      <main class="container container-palette pt-75 m30">
         <div class="container">
            <div class="wraper-row">
               <div class="column-content">
                  <div class="box-post-open m15">
                     <div class="post-open-thumbnail"><img SRC="{{Storage::disk('local')->url($post->image)}}" alt=""  style="height: 300px;"/></div>
                     <div class="header">
                        <h1 class="title">{{ $post->title }}</h1>
                        <div class="meta-tags">  <span class="meta-option"><i class="fa fa-calendar"></i>{{ $post->created_at->diffForHumans() }}</span>  <span class="meta-option"><i class="fa fa-comments"></i>4 Comments</span> </div>
                     </div>
                     <div class="body">
                        <p>{!! htmlspecialchars_decode($post->body) !!}</p>
                     </div>
                     <div class="footer">
                        <div class="left-side tags">  <b>Tags:</b>
                           @foreach ($post->tags as $tag)   
                           <a HREF="#">{{ $tag->name }},</a>  
                           @endforeach
                        </div>
                        <div class="right-side">
                           <ul class="social-content-btns">
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!-- ./ widget post description --> 
                  <div class="pwidget-usercard m15">
                     <div class="usercard-ghumbnail"><a HREF="06_Employee_Profile.html"><img SRC="{{asset('user/img/pic/open_post/user-card.jpg')}}" alt="" /></a></div>
                     <h2 class="title"><a HREF="#">{{ $post->posted_by }}</a></h2>>
                     <div class="footer">
                        <ul class="social">
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                           <li><a href="mailto:job.mail@example.com"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <!-- ./ widget card user --> 
                  {{-- <div class="pwidget-reviews" id="pwidget-reviews">
                     <div class="list-commets">
                        <h2 class="title">4 Comments</h2>
                        <ul class="list-reviews">
                           <li class="item">
                              <div class="thumbnail"><a HREF="18_Blog_Open.html"><img SRC="assets/img/pic/open_post/rewiever-clark.jpg" alt="" /></a></div>
                              <div class="body">
                                 <div class="header">
                                    <h2 class="title"><a HREF="06_Employee_Profile.html">Clark Robinson</a></h2>
                                    <div class="meta-tags">May 16, 2017</div>
                                 </div>
                                 <div class="text">Cras ligula enim, accumsan id aliquam ac, semper id lacus. Vestibulum ultricies sapien vel justo pretium, id aliquet sapien commodo. Nullam porttitor aliquam dolor, sodales congue lacus tristique asnec. </div>
                                 <div class="footer"><a HREF="18_Blog_Open.html" class="reply"><i class="fa fa-reply"></i>Reply</a></div>
                              </div>
                           </li>
                        </ul>
                     </div>
                     <div class="commets-form" id="commets-form">
                        <h2 class="title">Leave A Reply</h2>
                        <form action="#commets-form" class="job-form">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group"><input type="text" placeholder="Name" class="form-control" /></div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group"><input type="text" placeholder="Enter Your Email" class="form-control" /></div>
                              </div>
                           </div>
                           <div class="form-group"><textarea name="mes" rows="4" placeholder="Message" class="form-control"></textarea>  </div>
                           <div class="form-group">  <button class="btn btn-custom btn-custom-secondary">Send Message</button>  </div>
                        </form>
                     </div>
                  </div> --}}
                  <!-- ./ widget commtents and list comments --> 
               </div>
               <!-- ./ content --> 
               <div class="column-sidebar">
                  <div class="widget widget-posts">
                     <div class="widget-header">
                        <h2 class="title text-success">Recent Post</h2>
                     </div>
                     <div class="w-posts-list">
                        @foreach ($randPost as $rand)
                        <div class="item">
                           <div class="preview"><a href="{{ route('article',$rand->slug) }}"><img SRC="{{Storage::disk('local')->url($rand->image)}}" /></a></div>
                           <div class="body">
                              <h3 class="title"><a href="{{ route('article',$rand->slug) }}">{{ $rand->title }}</a></h3>
                              <div class="data">{{ $rand->created_at->diffForHumans() }}</div>
                           </div>
                        </div>
                        @endforeach

                     </div>
                  </div>
                  <!-- ./ widget recent listings --> 
                  <div class="widget">
                     <div class="widget-header">
                        <h2 class="title">Tags</h2>
                     </div>
                     <ul class="list-pins">
                        @foreach ($tags as $tag)
                        <li><a href="{{ route('tags',$tag->slug) }}">{{ $tag->name }}</a></li>
                        @endforeach
                     </ul>
                  </div>
                  <!-- ./ widget --> 
               </div>
               <!-- ./ sidebar --> 
            </div>
         </div>
      </main>
       @include('user.layouts.footer')
      <!-- ./ footer --> 
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{ asset('user/cache/js_18_blog_open.min.js')}}"></script> <script src="{{asset('user/libraries/pg-calendar/pg-calendar-master/dist/js/pignose.calendar.full.min.js')}}"></script> 
   </body>
   <!-- Mirrored from 127.0.0.1:8081/35FA31DC.001/listing-themes.com/jobworld-html/18_Blog_Open.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jul 2018 11:58:47 GMT -->
</html>