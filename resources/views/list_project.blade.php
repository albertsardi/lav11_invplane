<!DOCTYPE html>

<!--[if lt IE 7]>
<html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <title>Aulas univirtuales</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="NOINDEX,NOFOLLOW">

<link rel="icon" type="image/png" href="https://demo.invoiceplane.com/assets/core/img/favicon.png">

<link rel="stylesheet" href="https://demo.invoiceplane.com/assets/invoiceplane_blue/css/style.css?v=1.6.1">
<link rel="stylesheet" href="https://demo.invoiceplane.com/assets/core/css/custom.css?v=1.6.1">

    <link rel="stylesheet" href="https://demo.invoiceplane.com/assets/invoiceplane_blue/css/monospace.css?v=1.6.1">

<!--[if lt IE 9]>
<script src="https://demo.invoiceplane.com/assets/core/js/legacy.min.js?v=1.6.1"></script>
<![endif]-->

<script src="https://demo.invoiceplane.com/assets/core/js/dependencies.min.js?v=1.6.1"></script>

<script>
    Dropzone.autoDiscover = false;

    
    $(function () {
        $('.nav-tabs').tab();
        $('.tip').tooltip();

        $('body').on('focus', '.datepicker', function () {
            $(this).datepicker({
                autoclose: true,
                format: 'mm/dd/yyyy',
                language: 'en',
                weekStart: '0',
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
<body class="">

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
                        <span class="hidden-md">Projects</span>
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
                    <a href="https://demo.invoiceplane.com/users/form/1"
                       class="tip icon" data-placement="bottom"
                       title="InvoicePlane Demo User">
                        <i class="fa fa-user"></i>
                        <span class="visible-xs">&nbsp;InvoicePlane Demo User</span>
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
    <div class="sidebar hidden-xs">
    <ul>
        <li>
            <a href="https://demo.invoiceplane.com/clients/index" title="Clients"
               class="tip" data-placement="right">
                <i class="fa fa-users"></i>
            </a>
        </li>
        <li>
            <a href="https://demo.invoiceplane.com/quotes/index" title="Quotes"
               class="tip" data-placement="right">
                <i class="fa fa-file"></i>
            </a>
        </li>
        <li>
            <a href="https://demo.invoiceplane.com/invoices/index" title="Invoices"
               class="tip" data-placement="right">
                <i class="fa fa-file-text"></i>
            </a>
        </li>
        <li>
            <a href="https://demo.invoiceplane.com/payments/index" title="Payments"
               class="tip" data-placement="right">
                <i class="fa fa-money"></i>
            </a>
        </li>
        <li>
            <a href="https://demo.invoiceplane.com/products/index" title="Products"
               class="tip" data-placement="right">
                <i class="fa fa-database"></i>
            </a>
        </li>
                    <li>
                <a href="https://demo.invoiceplane.com/tasks/index" title="Tasks"
                   class="tip" data-placement="right">
                    <i class="fa fa-check-square-o"></i>
                </a>
            </li>
                <li>
            <a href="https://demo.invoiceplane.com/settings" title="System Settings"
               class="tip" data-placement="right">
                <i class="fa fa-cogs"></i>
            </a>
        </li>
    </ul>
</div>
    <div id="main-content">
        <div id="headerbar">
    <h1 class="headerbar-title">Projects</h1>

    <div class="headerbar-item pull-right">
        <a class="btn btn-sm btn-primary" href="https://demo.invoiceplane.com/products/form">
            <i class="fa fa-plus"></i> New        </a>
    </div>

    <div class="headerbar-item pull-right">
        <div class="model-pager btn-group btn-group-sm"><a class="btn btn-default disabled" href="#" title="First"><i class="fa fa-fast-backward no-margin"></i></a><a class="btn btn-default disabled" href="#" title="Prev"><i class="fa fa-backward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/products/index/25" title="Next"><i class="fa fa-forward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/products/index/50" title="Last"><i class="fa fa-fast-forward no-margin"></i></a></div>    </div>

</div>

<div id="content" class="table-content">

    
    <div class="table-responsive">
        <table class="table table-hover table-striped">

            <thead>
            <tr>
                <th>Active</th>
                <th>Project Name</th>
                <th>Client Name</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>
                        @if($d->Active==1)
                            <span class="label active">Yes</span>
                        @else
                            <span class="label notactive">No</span>
                        @endif
                    </td>
                    <td>{{$d->Name}}</td>
                    <td>clientname</td>
                    <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/146">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/146"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
                            <tr>
                    <td></td>
                    <td>10</td>
                    <td>Olie</td>
                    <td></td>
                    <td class="amount">$10,00</td>
                    <td>gal</td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/137">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/137"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td></td>
                    <td>1</td>
                    <td>poste alto</td>
                    <td></td>
                    <td class="amount">$259,00</td>
                    <td></td>
                    <td>IRPF</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/141">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/141"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td></td>
                    <td></td>
                    <td>SERVICES</td>
                    <td>asdad</td>
                    <td class="amount">$3.000,00</td>
                    <td></td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/120">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/120"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td></td>
                    <td></td>
                    <td>Spotify Family</td>
                    <td></td>
                    <td class="amount">$12,00</td>
                    <td></td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/126">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/126"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>4CYL SYNTH OIL CHANGE</td>
                    <td>1001</td>
                    <td>CLEANING / HAZMAT</td>
                    <td></td>
                    <td class="amount">$1,00</td>
                    <td></td>
                    <td>PA SALES TAX</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/79">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/79"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>4CYL SYNTH OIL CHANGE</td>
                    <td></td>
                    <td>sdfsdf</td>
                    <td>sdfsdf</td>
                    <td class="amount">$45,00</td>
                    <td></td>
                    <td>IVA</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/147">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/147"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>4CYL SYNTH OIL CHANGE</td>
                    <td>red1</td>
                    <td>test1</td>
                    <td>descccc</td>
                    <td class="amount">$23,00</td>
                    <td>Kg</td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/149">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/149"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>6CYL SYNTH OIL CHANGE</td>
                    <td></td>
                    <td>Aerrrr</td>
                    <td></td>
                    <td class="amount">$32,00</td>
                    <td>1RU</td>
                    <td>IRPF</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/132">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/132"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>6CYL SYNTH OIL CHANGE</td>
                    <td></td>
                    <td>LABOR - OIL CHANGE</td>
                    <td></td>
                    <td class="amount">$175,00</td>
                    <td>Hour</td>
                    <td>PA NO LABOR TAX</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/84">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/84"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>6CYL SYNTH OIL CHANGE</td>
                    <td></td>
                    <td>OIL FILTER</td>
                    <td></td>
                    <td class="amount">$110,00</td>
                    <td></td>
                    <td>PA SALES TAX</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/85">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/85"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>6CYL SYNTH OIL CHANGE</td>
                    <td></td>
                    <td>öl</td>
                    <td></td>
                    <td class="amount">$1.000,00</td>
                    <td>quart</td>
                    <td>Germany 19%</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/89">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/89"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>6CYL SYNTH OIL CHANGE</td>
                    <td></td>
                    <td>sss</td>
                    <td></td>
                    <td class="amount">$22,00</td>
                    <td></td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/134">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/134"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>6CYL SYNTH OIL CHANGE</td>
                    <td></td>
                    <td>SYNTHETIC OIL 5W40</td>
                    <td></td>
                    <td class="amount">$8,00</td>
                    <td>quart</td>
                    <td>PA SALES TAX</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/82">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/82"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Abonnements Canal plus</td>
                    <td>asdasdf</td>
                    <td>asdfasdf asdf asdf</td>
                    <td>asdfasdf asdf asdf asdf asdf </td>
                    <td class="amount">$2.000,00</td>
                    <td>Hour</td>
                    <td>CGST</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/86">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/86"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Abonnements Canal plus</td>
                    <td>1</td>
                    <td>Formule Access canal+</td>
                    <td>Formule Access Canal plus</td>
                    <td class="amount">$5.000,00</td>
                    <td>Month</td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/99">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/99"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Abonnements Canal plus</td>
                    <td>t5456467</td>
                    <td>Samsung Galaxy s1</td>
                    <td>Ram : 4GB<br />
Display :FullHD<br />
Internal: 260Gb</td>
                    <td class="amount">$123,00</td>
                    <td>Box</td>
                    <td>SGST</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/128">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/128"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>123</td>
                    <td>123 456 789</td>
                    <td class="amount">$215,00</td>
                    <td></td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/91">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/91"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>AAAAAA</td>
                    <td></td>
                    <td class="amount">$25,00</td>
                    <td>Month</td>
                    <td>SGST</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/106">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/106"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>Aastest </td>
                    <td></td>
                    <td class="amount">$500,00</td>
                    <td>Box</td>
                    <td>DPH</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/105">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/105"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td class="amount">$120,00</td>
                    <td>Hour</td>
                    <td>GST</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/88">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/88"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>Hosting</td>
                    <td>200</td>
                    <td class="amount">$200,00</td>
                    <td></td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/90">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/90"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>Occupied Square Meters</td>
                    <td></td>
                    <td class="amount">$2,00</td>
                    <td>M²</td>
                    <td>Tax Free</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/131">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/131"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>Test</td>
                    <td>test</td>
                    <td class="amount">$1.700,00</td>
                    <td>Hour</td>
                    <td>PA NO LABOR TAX</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/92">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/92"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                            <tr>
                    <td>Beratungsleistung</td>
                    <td></td>
                    <td>Test</td>
                    <td></td>
                    <td class="amount">$200,00</td>
                    <td></td>
                    <td>None</td>
                                        <td>
                        <div class="options btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle"
                               data-toggle="dropdown" href="#">
                                <i class="fa fa-cog"></i> Options                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://demo.invoiceplane.com/products/form/129">
                                        <i class="fa fa-edit fa-margin"></i> Edit                                    </a>
                                </li>
                                <li>
                                    <form action="https://demo.invoiceplane.com/products/delete/129"
                                          method="POST">
                                        <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('Are you sure you wish to delete this record?');">
                                            <i class="fa fa-trash-o fa-margin"></i> Delete                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                        </tbody>

        </table>
    </div>

</div>
    </div>

</div>

<div id="modal-placeholder"></div>

<div id="fullpage-loader" style="display: none">
    <div class="loader-content">
        <i id="loader-icon" class="fa fa-cog fa-spin"></i>
        <div id="loader-error" style="display: none">
            It seems that the application stuck because of an error.<br/>
            <a href="https://wiki.invoiceplane.com/en/1.0/general/faq"
               class="btn btn-primary btn-sm" target="_blank">
                <i class="fa fa-support"></i> Get Help            </a>
        </div>
    </div>
    <div class="text-right">
        <button type="button" class="fullpage-loader-close btn btn-link tip" aria-label="Close"
                title="Close" data-placement="left">
            <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
    </div>
</div>

<script defer src="https://demo.invoiceplane.com/assets/core/js/scripts.js"></script>

</body>
</html>
