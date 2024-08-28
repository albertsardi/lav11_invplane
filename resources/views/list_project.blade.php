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

@include('components.menubar2')

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
                    <td><a href='{{ url('projects/view/'.$d->id) }}'>{{$d->Name}}</a></td>
                    <td><a href='{{ url('clients/view/'.$d->clientId) }}'>{{$d->clientName??'-'}}</a></td>
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
