<!DOCTYPE html>
<html lang="en">
<head>
	@include('freelance.layouts.head')
</head>
<body class="hold-transition sidebar-mini">

	<div class="wrapper">

		@include('freelance.layouts.header')

		@include('freelance.layouts.sidebar')

		@yield('main-content')

		@include('freelance.layouts.footer')
		
	</div>
	
</body>
</html>