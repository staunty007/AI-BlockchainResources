<style>
   * {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
        "Segoe UI Emoji", "Segoe UI Symbol";
  }
</style>
<header>
         <div class="nav-bar container container-palette">
            <div class="wide-container">
               <div class="flex-row">
                  <div class="grid logo-container">
                     <div class="logo"><a HREF="{{ route('welcome') }}"><b class="text-color-primary">AI</b><small>BlockChain-Resorces</small></a></div>
                  </div>
                  <!-- ./ logo --> 
                  <div class="grid nav-menu">
                     <nav class="navbar navbar-expand-sm navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">  <span class="navbar-toggler-icon"></span> </button> 
                        <div class="collapse navbar-collapse default-menu-collapse" id="main-menu">
                           <button class="navbar-toggler mobile-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">  <i class="icon_close_alt2"></i>  </button>  
                           <ul class="nav navbar-nav collapse navbar-collapse default-menu" id="navbarNavDropdown">
                              <li class="nav-item dropdown active">
                                 <a class="nav-link" href="{{ route('welcome') }}" >Home</a>  
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link" href="{{ route('about') }}">About-Us  </a>  
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" HREF="{{ route('job.resume') }}">Create Resume</a>
                                    <a class="dropdown-item" HREF="{{ route('articles') }}">Submit Articles</a>
                                    <a class="dropdown-item" HREF="{{ route('jobs') }}">New Search Jobs</a>
                                    <a class="dropdown-item" HREF="{{ route('employer.login') }}">Create Companies</a>
                                 </div>  </li>
                                 <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logins</a>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" HREF="{{ route('login') }}">Applicants</a>
                                    <a class="dropdown-item" HREF="{{ route('employer.login') }}">Employer</a>
                                    <a class="dropdown-item" HREF="{{ route('freelance.login') }}">FreeLancer</a>
                                 </div>  </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link" href="{{ route('contact') }}">Contact-Us  </a>  
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <!-- ./ main menu --> 
                  @if (Auth::guest())
                  <div class="grid quick-navigation">  <a HREF="{{ route('login') }}" class="btn btn-clear"><i class="icon_profile"></i>Sign In</a> <a HREF="{{ route('employer.login') }}" class="btn btn-custom btn-custom-secondary">Post Jobs</a> </div>
                  @else

                  <div class="grid quick-navigation">  <a HREF="{{ route('home') }}" class="btn btn-clear"><i class="icon_profile"></i>Welcome. {{ ucfirst(Auth::user()->name) }}</a></div>
                  <div class="grid quick-navigation"> 
                     <a HREF="{{ route('logout') }}" class="btn btn-custom btn-custom-secondary"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a></div>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                     </form>
                  </div>
                  @endif
                  <!-- ./ actions panel --> 
               </div>
            </div>
         </div>
         <!-- ./ navigation bar --> 
      </header>