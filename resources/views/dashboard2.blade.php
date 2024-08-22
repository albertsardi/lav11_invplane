<!DOCTYPE html>

<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <title>ATON CRM</title>

@include('components.header')

<script>
    Dropzone.autoDiscover = false;
	
    //get total quote
    let promise1 = fetch('http://localhost/lav8invplane/api/total/quotation')
    .then(response => response.json())
    .then(data => {
        console.log(data)
        tot = data.Totalquotation;
        $('span.draft').text(tot.draft);
        $('span.sent').text(tot.sent);
        $('span.view').text(tot.view);
        $('span.approve').text(tot.approve);
        $('span.reject').text(tot.reject);
        $('span.cancel').text(tot.cancel);
        
    });

    //get total quote
    let promise2 = fetch('http://localhost/lav8invplane/api/total/invoice')
    .then(response => response.json())
    .then(data => {
        tot = data.Totalinvoice;
        $('span.draft').text(tot.draft);
        $('span.sent').text(tot.sent);
        $('span.view').text(tot.view);
        $('span.approve').text(tot.approve);
        $('span.reject').text(tot.reject);
        $('span.cancel').text(tot.cancel);
        //console.log(data)
    });

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

        $(document).on('click', '#showmodal', function () {
			bootbox.alert('Your message here…');
			$('#modal-placeholder').load("/invoices/ajax/modal_create_invoice");
        });

		$(document).on('click', '.create-invoice', function () {
            $('#modal-placeholder').load("/invoices/ajax/modal_create_invoice");
        });

        $(document).on('click', '.create-quote', function () {
            $('#modal-placeholder').load("/quotes/ajax/modal_create_quote");
        });

        $(document).on('click', '#btn_quote_to_invoice', function () {
            var quote_id = $(this).data('quote-id');
            $('#modal-placeholder').load("/quotes/ajax/modal_quote_to_invoice/" + quote_id);
        });

        $(document).on('click', '#btn_copy_invoice', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("/invoices/ajax/modal_copy_invoice", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_create_credit', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("/invoices/ajax/modal_create_credit", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_copy_quote', function () {
            var quote_id = $(this).data('quote-id');
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("/quotes/ajax/modal_copy_quote", {
                quote_id: quote_id,
                client_id: client_id
            });
        });

        $(document).on('click', '.client-create-invoice', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("/invoices/ajax/modal_create_invoice", {client_id: client_id});
        });

        $(document).on('click', '.client-create-quote', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("/quotes/ajax/modal_create_quote", {client_id: client_id});
        });

        $(document).on('click', '.invoice-add-payment', function () {
            var invoice_id = $(this).data('invoice-id');
            var invoice_balance = $(this).data('invoice-balance');
            var invoice_payment_method = $(this).data('invoice-payment-method');
            var payment_cf_exist =  $(this).data('payment-cf-exist');
            $('#modal-placeholder').load("/payments/ajax/modal_add_payment", {
                invoice_id: invoice_id,
                invoice_balance: invoice_balance,
                invoice_payment_method: invoice_payment_method,
                payment_cf_exist: payment_cf_exist
            });
        });

    });
</script>
</head>
@php
    if (!function_exists("fcur")) {
        function fcur($v) {
            $v = $v ?? 0;

            return number_format($v,2);
        }
    }
@endphp
<body class="hidden-sidebar">

<noscript>
    <div class="alert alert-danger no-margin">Please enable Javascript to use InvoicePlane</div>
</noscript>

<!-- navbar -->
@include('components.navbar')

<div id="main-area">
        <div id="main-content">
        <div id="content">
    
    <div class="row ">
        <div class="col-xs-12">

		@include('components.quickaction')
		<button type="button" id="showmodal" onclick="showmodal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        	Launch demo modal2
        </button>

			
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <div id="panel-quote-overview" class="panel panel-default overview">

                <div class="panel-heading">
                    <b><i class="fa fa-bar-chart fa-margin"></i> Quote Overview</b>
                    <span class="pull-right text-muted">This Month</span>
                </div>

				<table class="table table-hover table-bordered table-condensed no-margin">
                        <tr>
                            
							<td><a href="/quotes/status/draft">Draft</a></td>
                            <td class="amount"><span class="draft">Rp. {{fcur(0)}}</span></td>
                        </tr>
                        <tr>
                            <td><a href="/quotes/status/sent">Sent</a></td>
                            <td class="amount"><span class="sent">Rp. {{fcur(0)}}</span></td>
                        </tr>
                        <tr>
                            <td><a href="/quotes/status/viewed">Viewed</a></td>
                            <td class="amount"><span class="viewed">Rp. {{fcur(0)}}</td>
                        </tr>
                        <tr>
                            <td><a href="/quotes/status/approved">Approved</a></td>
                            <td class="amount"><span class="approved">Rp. {{fcur(0)}}</span></td>
                        </tr>
                        <tr>
                            <td><a href="/quotes/status/rejected">Rejected</a></td>
                            <td class="amount"><span class="rejected">Rp. {{fcur(0)}}</span></td>
                        </tr>
                        <tr>
                            <td><a href="/quotes/status/canceled">Canceled</a></td>
                            <td class="amount"><span class="canceled">Rp. {{0}}</span></td>
                        </tr>
                    </table>
            </div>

        </div>
        <div class="col-xs-12 col-md-6">

            <div id="panel-invoice-overview" class="panel panel-default overview">

                <div class="panel-heading">
                    <b><i class="fa fa-bar-chart fa-margin"></i> Invoice Overview</b>
                    <span class="pull-right text-muted">This Month</span>
                </div>

                <table class="table table-hover table-bordered table-condensed no-margin">
                        <tr>
                            <td><a href="/invoices/status/draft">Draft</a></td>
                            <td class="amount"><span class="draft">719,30&nbsp;EUR</span></td>
                        </tr>
                    	<tr>
                            <td><a href="/invoices/status/sent">Sent</a></td>
                            <td class="amount"><span class="sent">2.173,57&nbsp;EUR</span></td>
                        </tr>
                        <tr>
                            <td><a href="/invoices/status/viewed">Viewed</a></td>
                            <td class="amount"><span class="viewed">0,00&nbsp;EUR</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/invoices/status/paid">Paid</a>
                            </td>
                            <td class="amount"><span class="paid">0,00&nbsp;EUR</span></td>
                        </tr>
                </table>
            </div>


				<div class="panel panel-danger panel-heading">
					<a href="/invoices/status/overdue" class="text-danger"><i class="fa fa-external-link"></i> Overdue Invoices</a><span class="pull-right text-danger">1.128.084.711,19&nbsp;EUR</span>
                </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <div id="panel-recent-quotes" class="panel panel-default">

                <div class="panel-heading">
                    <b><i class="fa fa-history fa-margin"></i> Recent Quotes</b>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed no-margin">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th style="min-width: 15%;">Date</th>
                            <th style="min-width: 15%;">Quote</th>
                            <th style="min-width: 35%;">Client</th>
                            <th style="text-align: right;">Balance</th>
                            <th>pdf</th>
                        </tr>
                        </thead>
                        <tbody>
							@if (!empty($quotation))
                                @foreach($quotation as $q)
                                <tr>
                                    <td>
                                        @if($q->StatusID==0)
                                            <span class="label draft">Draft</span>
                                        @elseif($q->StatusID==1)
                                            <span class="label sent">Sent</span>
                                        @elseif($q->StatusID==2)
                                        <span class="label sent">Sent</span>
                                        @else
                                            {{$q->StatusID}}
                                        @endif
                                    </td>
                                    <td>{{$q->TransDate??''}}</td>
                                    <td><a href="quotation/view/{{$q->id}}">{{$q->TransNo??''}}</a></td>
                                    <td><a href="clients/view/{{$q->AccCode??''}}">{{$q->AccName??''}}</a>                                </td>
                                    <td class="amount">Rp. {{$q->Total??0}}</td>
                                    <td style="text-align: center;"><a href="quotation/generate_pdf/{{$q->id}}" title="Download PDF"><i class="fa fa-file-pdf-o"></i></a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-right small">
                                    <a href="/invoices/status/all">View All</a>                            </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan=5 rowspan=10 style="text-align:center;vertical-align:center;height:380px;">
                                        no data
                                    </td>
                                </tr>
                            @endif
                            <!-- <tr>
                                <td>
                                <span class="label sent">Sent</span>
                                </td>
                                <td>
                                    02.06.2024                                </td>
                                <td>
                                    <a href="/quotes/view/787">INV-{{$id??''}}</a>                                </td>
                                <td>
                                    <a href="/clients/view/245">David Quarta</a>                                </td>
                                <td class="amount">
                                    0,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/787"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label sent">Sent</span>
                                </td>
                                <td>
                                    02.06.2024                                </td>
                                <td>
                                    <a href="/quotes/view/786">REIG1202406-109</a>                                </td>
                                <td>
                                    <a href="/clients/view/245">David Quarta</a>                                </td>
                                <td class="amount">
                                    18,15&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/786"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label draft">Draft</span>
                                </td>
                                <td>
                                    01.06.2024                                </td>
                                <td>
                                    <a href="/quotes/view/785">14824</a>                                </td>
                                <td>
                                    <a href="/clients/view/245">David Quarta</a>                                </td>
                                <td class="amount">
                                    2.618,19&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/785"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label
                                draft">
                                    Draft                                </span>
                                </td>
                                <td>
                                    01.06.2024                                </td>
                                <td>
                                    <a href="/quotes/view/784">14724</a>                                </td>
                                <td>
                                    <a href="/clients/view/245">David Quarta</a>                                </td>
                                <td class="amount">
                                    0,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/784"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label
                                draft">
                                    Draft                                </span>
                                </td>
                                <td>
                                    01.06.2024                                </td>
                                <td>
                                    <a href="/quotes/view/783">14624</a>                                </td>
                                <td>
                                    <a href="/clients/view/224">Mario Andretti (M3)</a>                                </td>
                                <td class="amount">
                                    2.604,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/783"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label
                                sent">
                                    Sent                                </span>
                                </td>
                                <td>
                                    01.06.2024                                </td>
                                <td>
                                    <a href="/quotes/view/782">INV- 6</a>                                </td>
                                <td>
                                    <a href="/clients/view/72">SE1 SE1</a>                                </td>
                                <td class="amount">
                                    12,96&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/782"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label sent">Sent</span>
                                </td>
                                <td>
                                    01.06.2024                                </td>
                                <td>
                                    <a href="/quotes/view/781">14524</a>                                </td>
                                <td>
                                    <a href="/clients/view/128">Jatin Kumar</a>                                </td>
                                <td class="amount">
                                    100,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/781"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label
                                sent">
                                    Sent                                </span>
                                </td>
                                <td>
                                    31.05.2024                                </td>
                                <td>
                                    <a href="/quotes/view/780">14224</a>                                </td>
                                <td>
                                    <a href="/clients/view/304">AEL</a>                                </td>
                                <td class="amount">
                                    35.820,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/780"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td>
                                <span class="label
                                sent">
                                    Sent                                </span>
                                </td>
                                <td>
                                    31.05.2024                                </td>
                                <td>
                                    <a href="/quotes/view/779">INV-113</a>                                </td>
                                <td>
                                    <a href="/clients/view/343">Bahria Foundation School Maria </a>                                </td>
                                <td class="amount">
                                    82.500,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                    <a href="/quotes/generate_pdf/779"
                                       title="Download PDF">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                </td>
                            </tr>
                                                <tr>
                            <td colspan="6" class="text-right small">
                                <a href="/quotes/status/all">View All</a>                            </td>
                        </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-md-6">

            <div id="panel-recent-invoices" class="panel panel-default">

                <div class="panel-heading">
                    <b><i class="fa fa-history fa-margin"></i> Recent Invoices</b>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed no-margin">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th style="min-width: 15%;">Due Date</th>
                            <th style="min-width: 15%;">Invoice</th>
                            <th style="min-width: 35%;">Client</th>
                            <th style="text-align: right;">Balance</th>
                            <th>pdf</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(!empty($invoice))
                                @foreach($invoice as $i)
                                <tr>
                                    <td>
                                        @if($q->Status==0)
                                        <span class="label draft">Draft</span>
                                        @elseif($q->Status==1)
                                        <span class="label sent">Sent</span>
                                        @else
                                            {{$q->Status}}
                                        @endif 
                                    </td>
                                    <td>
                                        <span class="">{{$i->TransDate}}</span>
                                    </td>
                                    <td><a href="invoices/view/{{$i->id}}">{{$i->TransNo}}</a></td>
                                    <td><a href="/clients/view/{{$i->AccCode}}">{{$i->AccName}}</a></td>
                                    <td class="amount">Rp. {{$i->Total ?? 0}}</td>
                                    <td style="text-align: center;"><a href="/invoice/generate_pdf/{{$i->id}}2408" title="Download PDF"><i class="fa fa-file-pdf-o"></i></a></td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan=5 rowspan=10 style="text-align:center;vertical-align:center;height:380px;">
                                        no data
                                    </td>
                                </tr>
                            @endif
                            <!-- <tr>
                                <td>
                                    <span class="label sent">
                                        Sent                                                                                    &nbsp;<i class="fa fa-read-only" title="Read only"></i>
                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        02.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2407">REIG1202406-114</a>                                </td>
                                <td>
                                    <a href="/clients/view/96">Sabrina TestM</a>                                </td>
                                <td class="amount">
                                    595,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2407"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label sent">
                                        Sent                                                                                    &nbsp;<i class="fa fa-read-only" title="Read only"></i>
                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        02.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2405">REIG1202406-112</a>                                </td>
                                <td>
                                    <a href="/clients/view/227">Matthias TEst</a>                                </td>
                                <td class="amount">
                                    600,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2405"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label sent">
                                        Sent                                                                                    &nbsp;<i class="fa fa-read-only" title="Read only"></i>
                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        02.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2404">REIG1202406-111</a>                                </td>
                                <td>
                                    <a href="/clients/view/245">David Quarta</a>                                </td>
                                <td class="amount">
                                    8,80&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2404"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label draft">
                                        Draft                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        02.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2403">REIG1202406-110</a>                                </td>
                                <td>
                                    <a href="/clients/view/245">David Quarta</a>                                </td>
                                <td class="amount">
                                    0,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2403"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label sent">
                                        Sent                                                                                    &nbsp;<i class="fa fa-read-only" title="Read only"></i>
                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        02.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2402">INV- 9</a>                                </td>
                                <td>
                                    <a href="/clients/view/323">Aden Sakthi</a>                                </td>
                                <td class="amount">
                                    0,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2402"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label draft">
                                        Draft                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        02.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2401">INV-114</a>                                </td>
                                <td>
                                    <a href="/clients/view/323">Aden Sakthi</a>                                </td>
                                <td class="amount">
                                    0,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2401"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label draft">
                                        Draft                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        02.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2400">2400</a>                                </td>
                                <td>
                                    <a href="/clients/view/236">OC COMPANY</a>                                </td>
                                <td class="amount">
                                    0,00&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2400"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label sent">
                                        Sent                                                                                    &nbsp;<i class="fa fa-read-only" title="Read only"></i>
                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        01.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2399">RE 06012024426</a>                                </td>
                                <td>
                                    <a href="/clients/view/321">Dixie Spataro</a>                                </td>
                                <td class="amount">
                                    215,65&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2399"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr>
                                                    <tr>
                                <td>
                                    <span class="label sent">
                                        Sent                                                                                    &nbsp;<i class="fa fa-read-only" title="Read only"></i>
                                                                                                                    </span>
                                </td>
                                <td>
                                    <span class="">
                                        01.07.2024                                    </span>
                                </td>
                                <td>
                                    <a href="/invoices/view/2398">REIG1202406-108</a>                                </td>
                                <td>
                                    <a href="/clients/view/291">Client test Galopin</a>                                </td>
                                <td class="amount">
                                    414,12&nbsp;EUR                                </td>
                                <td style="text-align: center;">
                                                                            <a href="/invoices/generate_pdf/2398"
                                           title="Download PDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                                                    </td>
                            </tr> -->
                        
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

            <div class="row">
            <div class="col-xs-12 col-md-6">

                <div id="panel-projects" class="panel panel-default">

                    <div class="panel-heading">
                        <b><i class="fa fa-list fa-margin"></i> Projects</b>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed no-margin">
                            <thead>
                            <tr>
                                <th>Project name</th>
                                <th>Client Name</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($project))
                                @foreach($project as $p)
                                    <tr>
                                        <td>
                                            <a href="projects/view/{{$p->id}}">{{$p->Name}}</a>                                    </td>
                                        <td>
                                            <a href="clients/view/289">{{$p->AccName}}</a>                                    </td>
                                    </tr>
                                @endforeach
                                <tr>
                            		<td colspan="6" class="text-right small">
                                		<a href="/projects/index">View All</a>                            		</td>
                        		</tr>
                            @else
                                <tr>
                                    <td colspan=5 rowspan=10 style="text-align:center;vertical-align:center;height:380px;">
                                        no data
                                    </td>
                                </tr>
                            @endif    
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-md-6">

                <div id="panel-recent-invoices" class="panel panel-default">

                    <div class="panel-heading">
                        <b><i class="fa fa-check-square-o fa-margin"></i> Tasks</b>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed no-margin">

                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Task name</th>
                                <th>Finish date</th>
                                <th>Project</th>
                            </tr>
                            </thead>

                            <tbody>
                                @if (!empty($task))
                                    @foreach($task as $t)
                                    <tr>
                                        <td>
                                            @if($t->Status==0)
                                            <span class="label draft">Not started</span>
                                            @elseif($t->Status==1)
                                            <span class="label viewed">In progress </span>
                                            @elseif($t->Status==2)
                                            <span class="label sent">Complete </span>
                                            @elseif($t->Status==3)
                                            <span class="label paid">Invoiced </span>
                                            @else
                                            {{$t->statusName}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/tasks/form/{{$t->id}}">{{$t->Name}}</a>
                                        <td>
                                            <span class="font-overdue">{{$t->FinishDate}}</span>                                    
                                        </td>
                                        <td>
                                            <a href="/projects/view/11">{{$t->ProjectName}}</a>                                    
                                        </td>
                                    </tr>
                                    @endforeach    
                                @else
                                    <tr>
                                        <td colspan=5 rowspan=10 style="text-align:center;vertical-align:center;height:380px;">
                                            no data
                                        </td>
                                    </tr>
                                @endif                        
                                <tr>
                            		<td colspan="6" class="text-right small">
                                		<a href="/tasks/index">View All</a>                            		
                                    </td>
                        		</tr>
                            </tbody>

                        </table>
                    </div>

                </div>

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

<!-- Modal -->
<div class="d-none"> <!-- modal place holder -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"><!-- end of modal place holder -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div> <!-- end of modal place holder -->

<script defer src="/assets/core/js/scripts.js"></script>

</body>
</html>
