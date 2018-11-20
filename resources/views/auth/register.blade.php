<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Register</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="{{ asset('user/cache/css_22_log_in.min.css')}}"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
   </head>
   <body>
      @include('user.layouts.header')
      <!-- ./ header --> 
      <main class="page-sign container container-palette pt-95">
         <div class="container">
            <div class="sign-form">
               <div class="header">
                  <h1 class="title">Register Now</h1>
               </div>
               <form action="{{ route('register') }}" class="job-sign-from" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" placeholder="First Name" name="name" class="form-control" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Last Name" name="lastname" class="form-control" value="{{ old('lastname') }}"/>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" name="email" class="form-control" value="{{ old('email') }}"/>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" class="form-control" />
                </div>

                <div class="form-group">
                    <input type="password" placeholder="Confrim Password" name="password_confirmation" class="form-control" />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-custom btn-custom-secondary" value="Register">
                </div>
               </form>
               <div class="separate"><span>or</span></div>
               <a href="#" class="btn btn-custom btn-facebook">Continue With Facebook</a> 
               <div class="footer"> <span>Don't have a account?</span><br/> <a href="{{ route('login') }}" class="sign-from-link">Login</a> </div>
            </div>
         </div>
      </main>
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{ asset('user/cache/js_22_log_in.min.js')}}"></script>
      <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
      </script> 
   </body>
</html>