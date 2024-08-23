@extends('layouts.list_layout')

@section('js')
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
@stop


@section('content')
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

    <h1 class="headerbar-title">Clients</h1>

    <div class="headerbar-item pull-right">
        <button type="button" class="btn btn-default btn-sm submenu-toggle hidden-lg"
                data-toggle="collapse" data-target="#ip-submenu-collapse">
            <i class="fa fa-bars"></i> Submenu        </button>
        <a class="btn btn-primary btn-sm" href="https://demo.invoiceplane.com/clients/form">
            <i class="fa fa-plus"></i> New        </a>
    </div>

    @include('components.navbutton)
    @php
        $filter=$filter??'';
    @endphp
    <div class="headerbar-item pull-right visible-lg">
        <div class="btn-group btn-group-sm index-options">
            <a href="http://localhost/lav7_invplane/clients/list?status=active" class="btn  {{($filter=='active')?'btn-primary':'btn-default'}}">Active</a>
            <a href="http://localhost/lav7_invplane/clients/list?status=inactive" class="btn  {{($filter=='inactive')?'btn-primary':'btn-default'}}">Inactiv</a>
            <a href="http://localhost/lav7_invplane/clients/list?status=all" class="btn {{($filter=='all')?'btn-primary':'btn-default'}}">All</a>
        </div>
    </div>

</div>

<div id="submenu">
    <div class="collapse clearfix" id="ip-submenu-collapse">

        <div class="submenu-row">
            <div class="model-pager btn-group btn-group-sm"><a class="btn btn-default disabled" href="#" title="First"><i class="fa fa-fast-backward no-margin"></i></a><a class="btn btn-default disabled" href="#" title="Prev"><i class="fa fa-backward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/clients/status/active/25" title="Next"><i class="fa fa-forward no-margin"></i></a><a class="btn btn-default" href="https://demo.invoiceplane.com/clients/status/active/250" title="Last"><i class="fa fa-fast-forward no-margin"></i></a></div>        </div>

        <div class="submenu-row">
            <div class="btn-group btn-group-sm index-options">
                <a href="https://demo.invoiceplane.com/clients/status/active"
                   class="btn btn-primary">
                    Active                </a>
                <a href="https://demo.invoiceplane.com/clients/status/inactive"
                   class="btn  btn-default">
                    Inactive                </a>
                <a href="https://demo.invoiceplane.com/clients/status/all"
                   class="btn  btn-default">
                    All                </a>
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
            <th>Active</th>
            <th>Client Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th class="amount">Balance</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
            @php
                //function fcur($v) {
                    //$num = $v ?? 0;
                    //return number_format($num, 2);
                //}
            @endphp    
            @foreach($data as $d)
            <?php #dump($d);?>
            <tr class="{{($d->Active==1)?'active':'notactive'}}">
                @if($d->Active==1)
                    <td><span class="label active">Yes</span></td>
                @else
                    <td><span class="label notactive">NO</span></td>
                @endif
                <td><a href="client/view/{{$d->AccCode}}">{{$d->AccName}}</a></td>
                <!-- <td><a href="" class="__cf_email__" data-cfemail="{{$dt->Email??'--'}}">{{$dt->Email??'--'}}[email&#160;protected]</a></td> -->
                <td><a href="" class="__cf_email__" data-cfemail="{{$dt->Addr->Email??'--'}}">{{$d->Email??'--'}}</a></td>
                <td>{{$d->Phone??'--'}}</td>
                <td class="amount">{{$d->Balance??0}}</td>
                <td>
                    <div class="options btn-group">
                        <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cog"></i> Options                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://demo.invoiceplane.com/clients/view/390">
                                    <i class="fa fa-eye fa-margin"></i> View                                </a>
                            </li>
                            <li>
                                <a href="https://demo.invoiceplane.com/clients/form/390">
                                    <i class="fa fa-edit fa-margin"></i> Edit                                </a>
                            </li>
                            <li>
                                <a href="#" class="client-create-quote"
                                   data-client-id="390">
                                    <i class="fa fa-file fa-margin"></i> Create Quote                                </a>
                            </li>
                            <li>
                                <a href="#" class="client-create-invoice"
                                   data-client-id="390">
                                    <i class="fa fa-file-text fa-margin"></i> Create Invoice                                </a>
                            </li>
                            <li>
                                <form action="https://demo.invoiceplane.com/clients/delete/390"
                                      method="POST">
                                    <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">                                    <button type="submit" class="dropdown-button"
                                            onclick="return confirm('If you delete this client you will also delete any invoices, quotes and payments related to this client. Are you sure you want to permanently delete this client?');">
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

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script defer src="https://demo.invoiceplane.com/assets/core/js/scripts.js"></script>

</body>
@stop
