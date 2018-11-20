<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Sign In</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="{{ asset('user/cache/css_22_log_in.min.css')}}"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <style>
        .red {
          color: red;
        }
      </style>
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ header --> 
      <main class="page-sign container container-palette pt-95">
         <div class="container">
            <div class="sign-form">
               <div class="header">
                  <h1 class="title">Freelance LogIn</h1>
               </div>

               @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                  <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
               @endif

               <form action="{{ route('freelance.login') }}" class="job-sign-from" method="POST">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" placeholder="Email" name="email" class="form-control" value="{{ old('name') }}" autofocus/>
                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong class="red">{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" placeholder="Password" name="password" class="form-control" />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong class="red">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                  <div class="form-group">
                     <div class="flex-group">
                        <div class="left"><label class="checkbox-inline"><input type="checkbox" class="" />Keep me logged in</label></div>
                        <div class="right">  <a href="#" class="sign-from-link">Forgot password?</a> </div>
                     </div>
                  </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-custom btn-custom-secondary" value="Sign In">
                </div>
               </form>
               <div class="separate"><span>or</span></div>
               <a href="#" class="btn btn-custom btn-facebook">Continue With Facebook</a> 
               <div class="footer"> <span>Don't have a account?</span><br/> <a href="#" class="sign-from-link">Sign Up</a> </div>
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