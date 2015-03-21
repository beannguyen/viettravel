<!DOCTYPE html>
<html ng-app="travelblog">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ThemeBucket">
	<title>
		@if(isset($data['page_title']))
			{{ $data['page_title'] }}
		@else
			VietTravel Applications
		@endif
	</title>
	<link rel="shortcut icon" href="images/favicon.png">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="/assets/js/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/js/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/assets/js/plugins/bootstrap-3.3.2/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link href="/assets/js/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- This is how you would link your custom stylesheet -->
	<link rel="stylesheet" href="/assets/css/login3.css">
	<link rel="stylesheet" href="/assets/css/main.css" />
	<link href="/assets/js/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/js/plugins/datatables/media/js/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/assets/css/components-rounded.css">
	<link rel="stylesheet" href="/assets/css/plugins.css">
	<link href="/assets/css/layout3/css/layout.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
	<link href="/assets/css/layout3/css/custom.css" rel="stylesheet" type="text/css">

	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	@if( isset($data['styles']) )
		@foreach( $data['styles'] as $css )
			<link href="/assets/{{ $css }}" rel="stylesheet" type="text/css">
		@endforeach
	@endif
	<!-- END PAGE LEVEL PLUGIN STYLES -->

	<!--- JS --->
	<script src="/assets/js/plugins/jquery/jquery-1.11.2.min.js"></script>
	<script src="/assets/js/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="/assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
	<script src="/assets/js/plugins/modernizr/modernizr.js"></script>
	<script src="/assets/js/plugins/bootstrap-3.3.2/js/bootstrap.min.js"></script>
	<script src="/assets/js/angular/angular.min.js"></script>
	<script src="/assets/js/plugins/datatables/media/js/angular-datatables.min.js"></script>
	<script src="/assets/js/plugins/datatables/media/js/angular-datatables.bootstrap.min.js"></script>
	<script src="/assets/js/angular/angular-sanitize.min.js"></script>
	<script src="/assets/js/angular/ui-bootstrap-tpls-0.12.1.min.js"></script>
	<script src="/assets/js/directives/ui-validate.js"></script>
	<script src="/assets/js/app.js"></script>

    <!--- LAYOUT JS --->
	<script src="/assets/js/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="/assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/css/layout3/scripts/metronic.js" type="text/javascript"></script>
    <script src="/assets/css/layout3/scripts/layout.js" type="text/javascript"></script>


	<!-- BEGIN PAGE LEVEL PLUGIN SCRIPTS -->
	@if( isset($data['scripts']) )
		@foreach( $data['scripts'] as $js )
			<link href="/assets/{{ $js }}" rel="stylesheet" type="text/css">
		@endforeach
	@endif
	<!-- END PAGE LEVEL PLUGIN SCRIPTS -->

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]>
	<script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
        });
    </script>
</head>
@yield('body')
</html>