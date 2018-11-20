<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Articles Tags</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{asset('user/cache/css_16_blog_grid.min.css')}}"/>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ page title --> 
      <div class="section section-articles section-results-articles container container-palette">
         <div class="container">
            <div class="row row-flex results-default">

               @foreach ($post_tags as $post_tag)
               <div class="col-md-4">
                  <div class="thumbnail thumbnail-article">
                     <img SRC="assets/img/pic/advices/advice_4.jpg" alt="" class="preview" /> 
                     <div class="body">
                        <div class="top">Andy Green on May 15, 2017</div>
                        <h3 class="title"><a HREF="{{ route('article',$post_tag->slug) }}">{{ $post_tag->title }}</a></h3>
                     </div>
                     <div class="footer"><a HREF="{{ route('article',$post_tag->slug) }}" class="btn btn-more">Read More<i class="arrow_carrot-right"></i></a></div>
                  </div>
               </div>
               <!-- ./ one article --> 
               @endforeach

               {{ $post_tags->links() }}
                  
            </div>
            <!-- ./ articles grid --> 
         </div>
      </div>
      <!-- ./ section recent articles --> 
      <div class="section banner bg-color-primary container container-palette">
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
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{ asset('user/cache/js_16_blog_grid.min.js')}}"></script> 
   </body>
   <!-- Mirrored from 127.0.0.1:8081/35FA31DC.001/listing-themes.com/jobworld-html/16_Blog_Grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jul 2018 11:58:00 GMT -->
</html>