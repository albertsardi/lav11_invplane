<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Allegro - ERP System Administrator</title>
<meta name="description" content="Allegro - ERP System Administrtor">
<meta name="author" content="Albert - (c)ASAfoodenesia">

<html lang="en">
<head>
    <!-- BEGIN CSS for this page -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
    <!-- END CSS for this page -->
</head>

<!--<body class="adminbody widescreen" ng-controller="formCtrl">-->
<body >
	<? echo php #echo jsarray($dat,'post'); ?>
    <? echo php #echo jsarray($mCoa,'coa'); ?>

<div id="main">

	<!-- top bar navigation -->
    @include('topmenu')
    <!-- End Navigation -->

    <!-- Left Sidebar -->
    @include('menu')
    <!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">

			     <div class="row">
					<div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Product Data {{ $jr }}</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Forms</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
					</div>
			     </div>

			<div class="alert alert-success invisible" role="alert">
				<h5>Data Product saved.</h5>
			</div>
            <div id='result'></div>
            <form action="ajaxPost" method="post">
                <!-- panel button -->
                @include('buttonpanel',['jr'=>'customer'])

                <!-- <form  method='post'> -->
                {{ Form::hidden('formtype', $jr) }}
                {{ Form::hidden('_token',  csrf_token() ) }}
        
                <div class='row'>
                    @yield('content')
                </div>
                
                <div class='row'>
                    @yield('tab')
                </div>

                <div class='row'>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        Created [CreatedDate] by [CreatedBy] 
                    </div>
                </div>

            </form>
            
            </div>
			<!-- END container-fluid -->
                
                

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		<? #require 'footer.php' ?>
	</footer>

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pikeadmin.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/fastclick.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/js/helper_metroform.js') }}" type="text/javascript"></script> --}}
@yield('js')
<!-- END Java Script for this page -->

</body>
</html>

<!-- Modal -->
<!-- insert modal function HERE -->
{{-- $modal --}}
<script>
{{-- $jsmodal --}}
</script>
<!-- End Modal -->


