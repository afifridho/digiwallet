<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
	@yield('additional-css')

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    @include('layouts.navbar')
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		@include('layouts.sidebar')
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		@yield('content')
	</div>	<!--/.main-->

	<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('js/chart.min.js') }}"></script>
	<script src="{{ URL::asset('js/chart-data.js') }}"></script>
	<script src="{{ URL::asset('js/easypiechart.js') }}"></script>
	<script src="{{ URL::asset('js/easypiechart-data.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ URL::asset('js/custom.js') }}"></script>
	@yield('additional-js')
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</body>
</html>
