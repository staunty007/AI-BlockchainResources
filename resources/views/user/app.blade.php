<!DOCTYPE html>
<html lang="en">
   <head>
      @include('user/layouts/head')
   </head>
   <body>
      @include('user/layouts/header')
      
      <!-- ./ header --> 

      @yield('main-content')

      <!-- ./ section recent articles --> 
      @include('user/layouts/footer')
   </body>