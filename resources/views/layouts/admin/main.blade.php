<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
	@include('partials.admin._head')
</head>

<body>

	@include('partials.admin._navbar')

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

      @include('partials.admin._sidebar')
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					@include('partials.admin._page-header')
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
					@include('partials.admin._message')

          @yield('content')

				  @include('partials.admin._footer')

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
