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
	<style>
		.col-date {
			color: darkgreen;
		}
	</style>
	<!-- END CSS for this page -->
</head>

<body class="adminbody">

	<div id="main">

		<!-- top bar navigation -->
		@extends('topmenu')
		<!-- End Navigation -->

		<!-- Left Sidebar -->
		@extends('menu')
		<!-- End Sidebar -->


		<div class="content-page">

			<!-- Start content -->
			<div class="content">

				<div class="container-fluid">

					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-holder">
								<h1 class="main-title float-left"><?= $caption; ?></h1>
								<ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">Data Tables</li>
								</ol>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- end row -->

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> Transaction list</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="example1" class="table table-bordered table-hover display">
											{!! $grid !!}
										</table>
									</div>
								</div><!-- end card-->
							</div>
						</div>
					</div>
					<!-- END container-fluid -->

				</div>
				<!-- END content -->

			</div>
			<!-- END content-page -->

			<footer class="footer">
				<?php #require 'footer.php'	?>
			</footer>

		</div>
		<!-- END main -->

		<!-- BEGIN Java Script for this page -->
		<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/pikeadmin.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/fastclick.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
			// $('a').css('color','red');
			// START CODE FOR BASIC DATA TABLE
			$(document).ready(function() {
				var fcur= $.fn.dataTable.render.number(',','.',0,'Rp ')
				var jr='{{$jr}}';
				//alert(jr);
				switch (jr) {
					case 'DO':
						$('#example1').DataTable({
							"processing": true,
            				"serverSide": true,
							"pagingType": "full_numbers",
							"pageLength": 10,
            				'ajax':"{{ route('ajax_translist', 'DO' ) }}",
							//"ajax":"http://localhost/LV5_PikeAdmin_develop/ajax_translist/DO",
							/*"columns": [
                				{ "data": 0,
									render: function(data, type, row){
										return "<a href='#' class='link'>"+data[0]+"</a>";
									}
								},
								{ "data": null,
									//"defaultContent": "<a href='#' class='link'>"+data+"</a>"
									//render: $.fn.dataTable.render.data.display
								},
								{ "data": 1,
									render: function(data, type, row){
										return moment(data).format("DD/MM/YYYY");
									}
								},
                				{ "data": 2 },
                				{ "data": 3,
									"className":'col-number',
									render: $.fn.dataTable.render.number(',', '.', 0, '').display
								},
                				//{ "db": "Status" },
                				{ "data": 4 }
            				]*/
							columns: [
             				{ "data": null,
									render: function(data, type, row) {
										//return "<a href='trans-edit/"+data[0]+"' class='link'>"+data[0]+"</a>";
										return "<a href='{{ url('/trans-edit') }}/"+data[0]+"'>"+data[0]+"</a>";
									}
								},
								{ "data": 1, width:200,
									render: function (data, type, row) {
	                            return moment(data).format('DD/MM/YYYY');
	                        }
								},
								{ "data": 2},
								{ "data": 3, "className":'col-number', render: fcur },
								{ "data": 4},
            				]
						});
						break;
					case 'PI':
						$('#example1').DataTable({
							processing: true,
            				serverSide: true,
            				ajax: "{{ route('ajax_translist', 'PI' ) }}",
							columns: [
                				{ "data": null,
									render: function(data, type, row) {
										return "<a href='{{ url('/trans-edit') }}/"+data[0]+"'>"+data[0]+"</a>";
									}
								},
								{ "data": 1},
								{ "data": 2},
								{ "data": 3, "className":'col-number', render: fcur },
								{ "data": 4},
            				]
						});
						break;
					case 'SI':
					case 'IN':
						$('#example1').DataTable({
							processing: true,
            				serverSide: true,
							paging: true,
							//url:"{{ route('ajax_translist', 'SI' ) }}",
            				ajax: "{{ route('ajax_translist', 'IN' ) }}",
							/*ajax: function ( data, callback, settings ) {
									console.log(data);
									var out = [];
									for ( var i=data.start, ien=data.start+data.length ; i<ien ; i++ ) {
										console.log(i);
										//out.push( [ i+'-1', i+'-2', i+'-3', i+'-4', i+'-5' ] );
										//out.push( [ data[1], i+'-2', i+'-3', i+'-4', i+'-5' ] );
									}
									setTimeout( function () {
										callback( {
											draw: data.draw,
											//data: out,
											data: "http://localhost/LV5_PikeAdmin_develop/ajax_translist/SI",
											recordsTotal: 5000000,
											recordsFiltered: 5000000
										} );
									}, 10 );
        					},*/
							scrollY: 400,
							deferRender: true,
							scroller: { loadingIndicator: true 	},
							columns: [
								{ "data": null,
									render: function(data, type, row) {
										return "<a href='{{ url('/trans-edit') }}/"+data[0]+"'>"+data[0]+"</a>";
									}
								},
								{ "data": 1},
								{ "data": 2},
								{ "data": 3, "className":'col-number', render: $.fn.dataTable.render.number(',','.',0,'') },
								{ "data": 4}
            				]
						});
						break;

						/*
						$('#example1').DataTable({
							"pageLength": 10,
							"order":[[0, "desc"]],
							"deferRender":true,
							"processing":true,
							"serverSide":true,
							"ajax":"Trans/load_data",
							"columns": [
											{"data": "TransNo"},
											{"data": "TransDate",
												render: function(data, type, row){
															if(type === "sort" || type === "type"){
																return data;
															}
                											return moment(data).format("DD/MM/YYYY");
            											}
											},
											{"data": "AccName"},
											{"data": "Total",
												"className":'col-number',
												render: $.fn.dataTable.render.number(',', '.', 0, '').display
											},
											{"data": "Status"},
											{"data": "CreatedBy"}
										],
							"buttons": [
								'copy', 'csv', 'excel', 'pdf', 'print'
							]
						});
						break;
						*/
					case 'AR':
						$('#example1').DataTable({
							"processing": true,
            				"serverSide": true,
            				'ajax':"{{ route('ajax_translist', 'AR' ) }}",
						});
						break;
					case 'AP':
						$('#example1').DataTable({
							"processing": true,
            				"serverSide": true,
            				'ajax':"{{ route('ajax_translist', 'AP' ) }}",
						});
						break;
					case 'EX':
						$('#example1').DataTable({
							"processing": true,
            				"serverSide": true,
            				'ajax':"{{ route('ajax_translist', 'EX' ) }}",
						});
						break;
				}
				$('a .link').click(function(e) {
					e.preventDefault();
					alert('ddd');
					var link=$(this).text();
					alert(text);
				})
				$('td').click(function(e) {
					e.preventDefault();
					alert('ddd');
					var link=$(this).text();
					alert(text);
				})
			});
		</script>
		<!-- END Java Script for this page -->

</body>

</html>
