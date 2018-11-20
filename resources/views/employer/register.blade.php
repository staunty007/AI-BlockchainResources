<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Register</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" HREF="assets/img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="{{ asset('user/cache/css_22_log_in.min.css')}}"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
   </head>
   <body>
       @include('user.layouts.header')
      <!-- ./ header --> 
      <main class="page-sign container container-palette">
         <div class="container">
            <div class="sign-form">
               <div class="header">
                  <h1 class="title">Employer Registration</h1>
               </div>

               @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                  <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
               @endif

               <form action="{{ route('employer.register') }}" class="job-sign-from" method="POST">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" placeholder="First Name" name="name" class="form-control" value="{{ old('name') }}" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" placeholder="Last Name" name="lastname" class="form-control" value="{{ old('lastname') }}"/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <input type="email" placeholder="Email" name="email" class="form-control" value="{{ old('email') }}"/>
                </div>

                <div class="form-group">
                    <input type="text" placeholder="Company Name" name="company_name" class="form-control" value="{{ old('company_name') }}"/>
                </div>

                <div class="form-group">
                    <input type="text" id="address" placeholder="State" name="company_location" class="form-control" value="{{ old('company_location') }}"/>
                </div>
                
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" class="form-control" />
                </div>

                <div class="form-group">
                    <input type="password" placeholder="Confrim Password" name="password_confirmation" class="form-control" />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-custom btn-custom-secondary" value="Register as Employer">
                </div>
               </form>
               <div class="separate"><span>or</span></div> 
               <div class="footer"> <span>Don't have a account?</span><br/> <a href="#" class="sign-from-link">Sign Up</a> </div>
            </div>
         </div>
      </main>
      <div class="se-pre-con"></div>
      <!-- End Jquery --> <!-- Start BOOTSTRAP --> <!-- End Bootstrap --> <!-- Start Template files --> <!-- End Template files --> <!-- Start custom styles --> <!-- End custom styles --> <script src="{{ asset('user/cache/js_22_log_in.min.js')}}"></script> 
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
        <script>
            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>
      <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
      </script>
   </body>
</html>