@extends('layouts.form_layout',['title'=>'Project'])

@section('content')
<script>
    Dropzone.autoDiscover = false;

    
    $(function () {
        $('.nav-tabs').tab();
        $('.tip').tooltip();

        $('body').on('focus', '.datepicker', function () {
            $(this).datepicker({
                autoclose: true,
                format: 'dd.mm.yyyy',
                language: 'en',
                weekStart: '1',
                todayBtn: "linked"
            });
        });

        $(document).on('click', '.create-invoice', function () {
            $('#modal-placeholder').load("https://demo.invoiceplane.com/invoices/ajax/modal_create_invoice");
        });

        $(document).on('click', '.create-quote', function () {
            $('#modal-placeholder').load("https://demo.invoiceplane.com/quotes/ajax/modal_create_quote");
        });

        $(document).on('click', '#btn_quote_to_invoice', function () {
            var quote_id = $(this).data('quote-id');
            $('#modal-placeholder').load("https://demo.invoiceplane.com/quotes/ajax/modal_quote_to_invoice/" + quote_id);
        });

        $(document).on('click', '#btn_copy_invoice', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("https://demo.invoiceplane.com/invoices/ajax/modal_copy_invoice", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_create_credit', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("https://demo.invoiceplane.com/invoices/ajax/modal_create_credit", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_copy_quote', function () {
            var quote_id = $(this).data('quote-id');
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("https://demo.invoiceplane.com/quotes/ajax/modal_copy_quote", {
                quote_id: quote_id,
                client_id: client_id
            });
        });

        $(document).on('click', '.client-create-invoice', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("https://demo.invoiceplane.com/invoices/ajax/modal_create_invoice", {client_id: client_id});
        });

        $(document).on('click', '.client-create-quote', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("https://demo.invoiceplane.com/quotes/ajax/modal_create_quote", {client_id: client_id});
        });

        $(document).on('click', '.invoice-add-payment', function () {
            var invoice_id = $(this).data('invoice-id');
            var invoice_balance = $(this).data('invoice-balance');
            var invoice_payment_method = $(this).data('invoice-payment-method');
            var payment_cf_exist =  $(this).data('payment-cf-exist');
            $('#modal-placeholder').load("https://demo.invoiceplane.com/payments/ajax/modal_add_payment", {
                invoice_id: invoice_id,
                invoice_balance: invoice_balance,
                invoice_payment_method: invoice_payment_method,
                payment_cf_exist: payment_cf_exist
            });
        });

    });
</script>
</head>
<body class="hidden-sidebar">

<noscript>
    <div class="alert alert-danger no-margin">Please enable Javascript to use InvoicePlane</div>
</noscript>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ip-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                Menu &nbsp; <i class="fa fa-bars"></i>
            </button>
        </div>

        @include('components.menubar2')
    </div>
</nav>

<div id="main-area">
        <div id="main-content">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            A simple success alert—check it out!
        </div>
        @endif
        @if(session('fail'))
        <div class="alert alert-danger" role="alert">
            A simple danger alert—check it out!
        </div>
        @endif


        
<script type="text/javascript">
    $(function () {
        $("#client_country").select2({
            placeholder: "Country",
            allowClear: true
        });
    });
</script>

@if($formtype='update')
    <form method="post" action="/projects/update/{{$data->id??''}}">
@else
    <form method="post" action="/projects/create/}}">
@endif
	@csrf
    <!-- <input type="hidden" name="_ip_csrf"
           value="6a9f4c46631f071867f7d668302c31ca"> -->

    <!-- <div id="headerbar">
        <h1 class="headerbar-title">Client Form</h1>
        <div class="headerbar-item pull-right">
                <div class="btn-group btn-group-sm">
                    <button id="btn-submit" name="btn_submit" class="btn btn-success ajax-loader" value="1">
                        <i class="fa fa-check"></i> Save            </button>
                            <button type="button" onclick="window.history.back()" id="btn-cancel" name="btn_cancel" class="btn btn-danger" value="1">
                        <i class="fa fa-times"></i> Cancel            </button>
                </div>
        </div>
    </div> -->
    <!-- <HeaderBar /> -->

    <div id="content">

        
        <input class="hidden" name="is_update" type="hidden"
            value="0"        >

        <div class="row">
            <div class="col-xs-12 col-sm-12">

                <div class="panel panel-default">
                    <div class="panel-heading form-inline clearfix">
                        Personal Information
                        <div class="pull-right">
                            <label for="client_active" class="control-label">
                                Active <input id="client_active" name="Active" type="checkbox" value="1" checked="checked">
                            </label>
                        </div>
                    </div>

                    <div class="panel-body">

                    <div class="form-group">
                            <label for="client_surname">ID</label>
                            <input id="id" name="id" type="text" class="form-control" readonly value="{{$data->id??''}}">
                        </div>

                    <div class="form-group">
                            <label for="">Project Name</label>
                            <input id="client_surname" name="Name" type="text" class="form-control" value="{{$data->Name??''}}">
                        </div>

                        <div class="form-group">
                            <label for="">Invoice</label>
                            <input id="client_surname" name="InvNo" type="text" class="form-control" value="{{$data->InvNo??''}}">
                        </div>

                        <div class="form-group">
                            <label for="">Date</label>
                            <input id="client_surname" name="TransDate" type="text" class="form-control" value="{{$data->Name??''}}">
                        </div>

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input id="client_surname" name="Amount" type="numeric" class="form-control" value="{{$data->AmountPaid??0}}">
                        </div>

                        <div class="form-group">
                            <label for="">Note</label>
                            <input id="client_surname" name="Memo" type="text" class="form-control" value="{{$data->Name??''}}">
                        </div>

                        <div class="form-group no-margin">
                            <label for="client_language">Client Name</label>
                            <select name="PaymentType" id="client_language" class="form-control simple-select">
                            @foreach(($mPaymentType) as $m)
                                    @php
                                        $select=($data->AccCode==$m['id'])?'selected':'';
                                    @endphp
                                    <option value="{{$m['id']}} {{$select}}">{{$m['Name']}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">

                    <div class="panel-heading">Address</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="client_address_1">Street Address</label>

                            <div class="controls">
                                <input type="text" name="Address1" id="client_address_1" class="form-control" value="{{$data->Address1??''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_address_2">Street Address (continue)</label>

                            <div class="controls">
                                <input type="text" name="Address2" id="client_address_2" class="form-control" value="{{$data->Address2??''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_country">City</label>

                            <div class="controls">
                                <input type="text" name="City" id="client_address_2" class="form-control" value="{{$data->City??''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_state">Province</label>

							<div class="controls">
                                <input type="text" name="State" id="client_zip" class="form-control" value="{{$data->State??''}}">
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_zip">Zip Code</label>

                            <div class="controls">
                                <input type="text" name="Zip" id="client_zip" class="form-control" value="{{$address->Zip??''}}">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="client_country">Country</label>
                            <div class="controls">
                                <input type="text" name="Country" id="client_zip" class="form-control" value="{{$data->Country??''}}">
                            </div>
                        </div>


                </div>

            </div>
            <div class="col-xs-12 col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Contact Information                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="client_phone">Phone Number</label>

                            <div class="controls">
                                <input type="text" name="client_phone" id="client_phone" class="form-control" value="{{$address->Phone??''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_fax">Fax Number</label>

                            <div class="controls">
                                <input type="text" name="FaxNo" class="form-control" value="{{$data->FaxNo??''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_mobile">Mobile Number</label>

                            <div class="controls">
                                <input type="text" name="MobileNo" id="client_mobile" class="form-control" value="{{$data->MobileNo??''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_email">Email Address</label>

                            <div class="controls">
                                <input type="text" name="client_email" id="client_email" class="form-control" value="{{$data->Email??''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_web">Web Address</label>

                            <div class="controls">
                                <input type="text" name="client_web" id="client_web" class="form-control"
                                       value="{{$data->WebAddress??''}}">
                            </div>
                        </div>

                        <!-- Custom fields -->
                                                                                                                <div class="form-group">
        
                
    </div> 
                                                                            </div>

                </div>

            </div>
        </div>

        
            </div>
			<button type="submit">Submit</button>
</form>
@stop
    

