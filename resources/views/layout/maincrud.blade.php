<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('bootstraptemplate/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('bootstraptemplate/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('bootstraptemplate/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('bootstraptemplate/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('bootstraptemplate/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('bootstraptemplate/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('bootstraptemplate/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/ui/fullcalendar/core/main.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js') }}"></script>

	<script src="{{ asset('bootstraptemplate/assets/js/app.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/demo_pages/user_pages_profile.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/demo_charts/echarts/light/bars/tornado_negative_stack.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/demo_charts/pages/profile/light/balance_stats.js') }}"></script>
	<script src="{{ asset('bootstraptemplate/global_assets/js/demo_charts/pages/profile/light/available_hours.js') }}"></script>
	<!-- /theme JS files -->



    <title>{{ $title }}</title>
  </head>
  <body>
    @include('layout.navbarcrud')

    <!-- Page content -->
	<div class="page-content">
		@auth
		@include('layout.sidebarcrud')
		@endauth
		
		<!-- Main content -->
		<div class="content-wrapper">
            @yield('container')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script>
        function previewImg(){
        const sampul = document.querySelector('#sampul');
        //const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        //sampulLabel.textContent = sampul.files[0].name;
        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
        }
    </script>
  </body>
</html>