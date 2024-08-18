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


        <div class="collapse navbar-collapse" id="ip-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="https://demo.invoiceplane.com/dashboard" class="hidden-md">Dashboard</a>                    <a href="https://demo.invoiceplane.com/dashboard" class="visible-md-inline-block"><i class="fa fa-dashboard"></i></a>                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Clients</span>
                        <i class="visible-md-inline fa fa-users"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="https://demo.invoiceplane.com/clients/form">Add Client</a></li>
                        <li><a href="https://demo.invoiceplane.com/clients/index">View Clients</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Quotes</span>
                        <i class="visible-md-inline fa fa-file"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="create-quote">Create Quote</a></li>
                        <li><a href="https://demo.invoiceplane.com/quotes/index">View Quotes</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Invoices</span>
                        <i class="visible-md-inline fa fa-file-text"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="create-invoice">Create Invoice</a></li>
                        <li><a href="https://demo.invoiceplane.com/invoices/index">View Invoices</a></li>
                        <li><a href="https://demo.invoiceplane.com/invoices/recurring/index">View Recurring Invoices</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Payments</span>
                        <i class="visible-md-inline fa fa-credit-card"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="https://demo.invoiceplane.com/payments/form">Enter Payment</a></li>
                        <li><a href="https://demo.invoiceplane.com/payments/index">View Payments</a></li>
                        <li><a href="https://demo.invoiceplane.com/payments/online_logs">View Online Payment Logs</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Products</span>
                        <i class="visible-md-inline fa fa-database"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="https://demo.invoiceplane.com/products/form">Create product</a></li>
                        <li><a href="https://demo.invoiceplane.com/products/index">View Products</a></li>
                        <li><a href="https://demo.invoiceplane.com/families/index">View Product Families</a></li>
                        <li><a href="https://demo.invoiceplane.com/units/index">View Product Units</a></li>
                    </ul>
                </li>

                <li class="dropdown 1">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Tasks</span>
                        <i class="visible-md-inline fa fa-check-square-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="https://demo.invoiceplane.com/tasks/form">Create Task</a></li>
                        <li><a href="https://demo.invoiceplane.com/tasks/index">View Tasks</a></li>
						<li role="separator" class="divider"></li>
                        <li><a href="https://demo.invoiceplane.com/projects/form">Create Project</a></li>
                        <li><a href="https://demo.invoiceplane.com/projects/index">View Projects</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Reports</span>
                        <i class="visible-md-inline fa fa-bar-chart"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="https://demo.invoiceplane.com/reports/invoice_aging">Invoice Aging</a></li>
                        <li><a href="https://demo.invoiceplane.com/reports/payment_history">Payment History</a></li>
                        <li><a href="https://demo.invoiceplane.com/reports/sales_by_client">Sales by Client</a></li>
                        <li><a href="https://demo.invoiceplane.com/reports/sales_by_year">Sales by Date</a></li>
                    </ul>
                </li>

            </ul>

            
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="https://wiki.invoiceplane.com/" target="_blank"
                       class="tip icon" title="Documentation"
                       data-placement="bottom">
                        <i class="fa fa-question-circle"></i>
                        <span class="visible-xs">&nbsp;Documentation</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="tip icon dropdown-toggle" data-toggle="dropdown"
                       title="Settings"
                       data-placement="bottom">
                        <i class="fa fa-cogs"></i>
                        <span class="visible-xs">&nbsp;Settings</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="https://demo.invoiceplane.com/custom_fields/index">Custom Fields</a></li>
                        <li><a href="https://demo.invoiceplane.com/email_templates/index">Email Templates</a></li>
                        <li><a href="https://demo.invoiceplane.com/invoice_groups/index">Invoice Groups</a></li>
                        <li><a href="https://demo.invoiceplane.com/invoices/archive">Invoice Archive</a></li>
                        <!-- // temporarily disabled
                        <li><a href="https://demo.invoiceplane.com/item_lookups/index">Item Lookups</a></li>
                        -->
                        <li><a href="https://demo.invoiceplane.com/payment_methods/index">Payment Methods</a></li>
                        <li><a href="https://demo.invoiceplane.com/tax_rates/index">Tax Rates</a></li>
                        <li><a href="https://demo.invoiceplane.com/users/index">User Accounts</a></li>
                        <li class="divider hidden-xs hidden-sm"></li>
                        <li><a href="https://demo.invoiceplane.com/settings">System Settings</a></li>
                        <li><a href="https://demo.invoiceplane.com/import">Import Data</a></li>
                    </ul>
                </li>
                <li>
                    <a href="https://demo.invoiceplane.com/users/form/2"
                       class="tip icon" data-placement="bottom"
                       title="InvoicePlane Guest">
                        <i class="fa fa-user"></i>
                        <span class="visible-xs">&nbsp;InvoicePlane Guest</span>
                    </a>
                </li>
                <li>
                    <a href="https://demo.invoiceplane.com/sessions/logout"
                       class="tip icon logout" data-placement="bottom"
                       title="Logout">
                        <i class="fa fa-power-off"></i>
                        <span class="visible-xs">&nbsp;Logout</span>
                    </a>
                </li>
            </ul>
        </div>
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
    <form method="post" action="/tasks/update/{{$data->id??''}}">
@else
    <form method="post" action="/tasks/create/}}">
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
                            <label for="client_surname">Finish Date</label>
                            <input name="FinishDate" type="text" class="form-control"  value="{{$data->FinishDate??''}}">
                        </div>

                    <div class="form-group">
                            <label for="client_surname">Project Name</label>
                            <!-- <input name="Projectid" type="text" class="form-control"  value="{{$data->Projectid??''}}"> -->
                            <select name="Projectid" id="client_language" class="form-control simple-select">
                                @foreach(json_decode($mProject) as $m)
                                    @php
                                        $select=($data->Projectid==$m->id)?'selected':'';
                                    @endphp
                                    <option value="{{$m->id}} {{$select}}">{{$m->Name}}</option>
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
    

