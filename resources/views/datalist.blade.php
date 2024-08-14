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
    {{--{{ HTML::style("public/assets/css/dataTables.css") }}
    {{ HTML::style("public/assets/css/jquery.dataTables.min.css") }}  --}}
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
							<h1 class="main-title float-left">caption </h1>
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
									<h3><i class="fa fa-table"></i> Data list</h3>
								</div>
								<div class="card-body">
                            <table id="example1" class="table table-bordered table-hover display mx-10">
					                  {!! $grid !!}
                            </table>
                            <!--<nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>-->
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
		[footer.php]
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
<script>
// START CODE FOR BASIC DATA TABLE
$(document).ready(function() {
   var fcur= $.fn.dataTable.render.number(',','.',0,'Rp ');
   var jr='{{$jr}}';
   //alert(jr);
    switch(jr) {
         case 'customer':
            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
				pageLength: 10,
                ajax:"{{ route('ajax_datalist', 'customer' ) }}",
                // "ajax":"http://localhost/LV5_PikeAdmin_develop/ajax_datalist/customer",
                columns: [
                    { data: null,
                        render: function (data, type, row) {
                            var id=data[0];
                            var url= "{{ url('/customer-edit') }}/"+id;
                            //return "<a href='url'>"+id+"</a>";
                            return "<a href='{{ url('/customer-edit') }}/"+data[0]+"'>"+data[1]+"</a>";
                        }
                    },
                    { data: 0 },
                    { data: 2 },
                    { data: 3 },
                    { data: 4 },
                    { data: 5, "className":'col-number', render: fcur }
                ]
            });
            break;
        case 'supplier':
            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
				pageLength: 10,
                ajax:"{{ route('ajax_datalist', 'supplier' ) }}",
                columns: [
                    { data: null,
                        render: function (data, type, row) {
                            //return "<a href='{{ url('/dataedit') }}/"+data[0]+"'>"+data[0]+"</a>";
                            return "<a href='{{ url('/supplier-edit') }}/"+data[0]+"'>"+data[0]+"</a>";
                        }
                    },
                    { data: 1 },
                    { data: 2 },
                    { data: 3 },
                    { data: 4 },
                    { data: 5, "className":'col-number', render: fcur }
                ]
            });
            break;
        case 'product':
            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                //'paging': false,
                pagingType: "full_numbers",
	              pageLength: 10,
                ajax:"{{ route('ajax_datalist', 'product' ) }}",
                columns: [
                        { data: null,
                            render: function (data, type, row) {
                                return "<a href='{{ url('/product-edit') }}/"+data[0]+"'>"+data[1]+"</a>";
                            }
                        },
                        { data: 0 },
                        { data: 2 },
                        { data: 3 },
                        { data: 4, "className":'col-number', render: fcur }
                    ]
            });
            break;
        case 'coa':
            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                //'paging': false,
                pagingType: "full_numbers",
	              pageLength: 10,
                ajax:"{{ route('ajax_datalist', 'coa' ) }}",
                columns: [
                        { "data": 0 },
                        { "data": 1 },
                        { "data": 2 },
                        { "data": 3, "className":'col-number', render: fcur }
                    ]
            });
            break;
        /*case 'bank':
            $('#example1').DataTable({
				"pageLength": 10,
                "columns": [
                        { "data": "AccNo" },
                        { "data": "AccName" },
                        { "data": "Category" },
                        { "data": "Amount", "className":'col-number', render: $.fn.dataTable.render.number(',','.',0,'') }
                    ]
            });
            break;
		case 'bom':
            $('#example1').DataTable({
				"pageLength": 10,
                "columns": [
                        { "data": "pcode" },
                        { "data": "pname" },
                        { "data": "pcat" },
                        { "data": "ptype" }
                    ]
            });
            break;*/
    }
});
// END CODE FOR BASIC DATA TABLE
</script>
<!-- END Java Script for this page -->

</body>
</html>
