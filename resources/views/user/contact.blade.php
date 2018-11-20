<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from 127.0.0.1:8081/35FA31DC.001/listing-themes.com/jobworld-html/20_Contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jul 2018 11:58:48 GMT -->
   <head>
      <meta charset="UTF-8" />
      <title>Contact</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- Start JS MAP --> <!-- End JS MAP --> <!-- End custom styles --> 
      <link rel="stylesheet" href="{{asset('user/cache/css_20_contact.min.css')}}"/>
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ header --> 
      <div class="saercion section-page-title container container-palette">
         <div class="container">
            <h2 class="title">Contact-Us</h2>
         </div>
      </div>
      <!-- ./ page title --> 
      <main class="container container-palette pt-75 pb-40">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="widget-contat-form m55" id="form_contact">
                     <div class="validation d-none m25">
                        <div class="alert alert-primary" role="alert">  Email Sent Successfully </div>
                     </div>
                     <form action="#form_contact" class="job-form default jborder">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group"><input type="text" placeholder="Name" class="form-control" /></div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group"><input type="text" placeholder="Enter Your Email" class="form-control" /></div>
                           </div>
                        </div>
                        <div class="form-group"><textarea name="mes" rows="4" placeholder="Message" class="form-control"></textarea> </div>
                        <div class="form-group">  <button class="btn btn-custom btn-custom-secondary">Send Message</button> </div>
                     </form>
                  </div>
                  <!-- ./ widget contact form --> 
               </div>
               <div class="col-md-4">
                  <div class="column-sidebar">
                     <div class="widget widget-btn">
                        <div class="widget-btn-icon"><i class="icon_mail_alt"></i></div>
                        <div class="widget-btn-text">For Enquiries: <small><a href="mailto:Info@Aibr.com">Info@Aibr.com</a></small></div>
                        <div class="widget-btn-text">For Support: <small><a href="mailto:Support@Aibr.Com">Support@Aibr.Com</a></small></div>
                     </div>
                     <!-- ./ widget --> 
                     <div class="widget widget-btn">
                        <div class="widget-btn-icon"><i class="icon_phone"></i></div>
                        <div class="widget-btn-text">Aus: <a href="tel://099 999 234 6890">099 999 234 6890 </a></div>
                        <div class="widget-btn-text">Uk: <a href="tel://+91 565 8822 9908">+91 565 8822 9908 </a></div>
                     </div>
                     <!-- ./ widget --> 
                  </div>
                  <!-- ./ sidebar -->
               </div>
            </div>
         </div>
      </main>
       @include('user.layouts.footer')
      <!-- ./ footer --> 
      <div class="se-pre-con"></div> <!-- End JS MAP --> <!-- Start custom styles --> <!-- End custom styles --> 
      <script src="{{ asset('user/cache/js_20_contact.min.js')}}"></script> 
   </body>
</html>