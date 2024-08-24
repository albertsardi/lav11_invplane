@extends('layouts.list_layout')

@section('content')


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

@include('components.navbar2')

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

    <h1 class="headerbar-title">Quotes</h1>

    <div class="headerbar-item pull-right">
        <button type="button" class="btn btn-default btn-sm submenu-toggle hidden-lg"
                data-toggle="collapse" data-target="#ip-submenu-collapse">
            <i class="fa fa-bars"></i> Submenu        </button>
        <a class="create-quote btn btn-sm btn-primary" href="#">
            <i class="fa fa-plus"></i> New        </a>
    </div>

    <div class="headerbar-item pull-right visible-lg">
        <div class="model-pager btn-group btn-group-sm"><a class="btn btn-default disabled" href="#" title="First"><i class="fa fa-fast-backward no-margin"></i></a><a class="btn btn-default disabled" href="#" title="Prev"><i class="fa fa-backward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/quotes/status/all/25" title="Next"><i class="fa fa-forward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/quotes/status/all/400" title="Last"><i class="fa fa-fast-forward no-margin"></i></a></div>    </div>

    <div class="headerbar-item pull-right visible-lg">
        <div class="btn-group btn-group-sm index-options">
            <a href="https://demo.invoiceplane.com/quotes/status/all"
               class="btn btn-primary">
                All            </a>
            <a href="https://demo.invoiceplane.com/quotes/status/draft"
               class="btn btn-default">
                Draft            </a>
            <a href="https://demo.invoiceplane.com/quotes/status/sent"
               class="btn btn-default">
                Sent            </a>
            <a href="https://demo.invoiceplane.com/quotes/status/viewed"
               class="btn btn-default">
                Viewed            </a>
            <a href="https://demo.invoiceplane.com/quotes/status/approved"
               class="btn btn-default">
                Approved            </a>
            <a href="https://demo.invoiceplane.com/quotes/status/rejected"
               class="btn btn-default">
                Rejected            </a>
            <a href="https://demo.invoiceplane.com/quotes/status/canceled"
               class="btn btn-default">
                Canceled            </a>
        </div>
    </div>

</div>

<div id="submenu">
    <div class="collapse clearfix" id="ip-submenu-collapse">

        <div class="submenu-row">
            <div class="model-pager btn-group btn-group-sm"><a class="btn btn-default disabled" href="#" title="First"><i class="fa fa-fast-backward no-margin"></i></a><a class="btn btn-default disabled" href="#" title="Prev"><i class="fa fa-backward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/quotes/status/all/25" title="Next"><i class="fa fa-forward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/quotes/status/all/400" title="Last"><i class="fa fa-fast-forward no-margin"></i></a></div>        </div>

        <div class="submenu-row">
            <div class="btn-group btn-group-sm index-options">
                <a href="https://demo.invoiceplane.com/quotes/status/all"
                   class="btn btn-primary">
                    All                </a>
                <a href="https://demo.invoiceplane.com/quotes/status/draft"
                   class="btn btn-default">
                    Draft                </a>
                <a href="https://demo.invoiceplane.com/quotes/status/sent"
                   class="btn btn-default">
                    Sent                </a>
                <a href="https://demo.invoiceplane.com/quotes/status/viewed"
                   class="btn btn-default">
                    Viewed                </a>
                <a href="https://demo.invoiceplane.com/quotes/status/approved"
                   class="btn btn-default">
                    Approved                </a>
                <a href="https://demo.invoiceplane.com/quotes/status/rejected"
                   class="btn btn-default">
                    Rejected                </a>
                <a href="https://demo.invoiceplane.com/quotes/status/canceled"
                   class="btn btn-default">
                    Canceled                </a>
            </div>
        </div>

    </div>
</div>

<div id="content" class="table-content">

    <div id="filter_results">
        <div class="table-responsive">
    <table class="table table-hover table-striped">

        <thead>
        <tr>
            <th>Status</th>
            <th>Quote</th>
            <th>Created</th>
            <th>Due Date</th>
            <th>Client Name</th>
            <th style="text-align: right; padding-right: 25px;">Amount</th>
            <th>Options</th>
        </tr>
        </thead>

        <tbody>
            @php
                function fcur($v) {
                    $num = $v ?? 0;
                    return 'Rp. '.number_format($num, 2);
                }
            @endphp        
            @foreach($data as $d)
            <?php #dump($d);?>
            <tr>
                @if($d->Status==0)
                    <td><span class="label draft">Draft</span></td>
                @elseif($d->Status==1)
                    <td><span class="label sent">Sent</span></td>
                @else
                    <td><span class="label approved">Approved</span></td>
                @endif
                <td><a href="http://localhost/lav7_invplane/quote/form/{{$d->id}}"  title="Edit">{{$d->TransNo}}</a></td>
                <td>{{$d->TransDate}}</td>
                <td>{{$d->DueDate}}</td> <!-- 07/21/2024 -->
                <td><a href="clients/view/{{$d->AccCode}}"  title="View Client">{{$d->AccName}}</td>
                <td style="text-align: right; padding-right: 25px;">{{fcur($d->Total)}}</td>
                <td>
                    <div class="options btn-group">
                        <a class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                           href="#">
                            <i class="fa fa-cog"></i> Options                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://demo.invoiceplane.com/quotes/view/918">
                                    <i class="fa fa-edit fa-margin"></i> Edit                                </a>
                            </li>
                            <li>
                                <a href="https://demo.invoiceplane.com/quotes/generate_pdf/918"
                                   target="_blank">
                                    <i class="fa fa-print fa-margin"></i> Download PDF                                </a>
                            </li>
                            <li>
                                <a href="https://demo.invoiceplane.com/mailer/quote/918">
                                    <i class="fa fa-send fa-margin"></i> Send Email                                </a>
                            </li>
                            <li>
                                <form action="https://demo.invoiceplane.com/quotes/delete/918"
                                      method="POST">
                                    <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                    <button type="submit" class="dropdown-button"
                                            onclick="return confirm('If you delete this quote you will not be able to recover it later. Are you sure you want to permanently delete this quote?');">
                                        <i class="fa fa-trash-o fa-margin"></i> Delete                                    </button>
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
