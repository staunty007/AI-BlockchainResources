<!DOCTYPE html>
<html lang="en">
<head>
	@include('employer.layouts.head')
</head>
<body class="hold-transition sidebar-mini">

	<div class="wrapper">

		@include('employer.layouts.header')

		@include('employer.layouts.sidebar')

		@yield('main-content')

		@include('employer.layouts.footer')
		
	</div>
	
</body>
</html>