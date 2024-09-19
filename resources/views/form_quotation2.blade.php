@extends('layouts.form_layout')

@section('js')
<!-- section js -->
<!-- <script lang="javascript" src="http://localhost/lav11_invplanePdf/resources/js/editgrid.js"></script> -->
<!-- use version 0.20.2 -->
<script lang="javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" type="text/css" />
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- use bootbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // Dropzone.autoDiscover = false;

    
    //$(function () {
    $(document).ready(function(){
        //$('.nav-tabs').tab();
        //$('.tip').tooltip();
        // if (jQuery) {  
        //        // jQuery is loaded  
        //        alert("jQuery running!");
        //      } else {
        //        // jQuery is not loaded
        //        alert("jQuery not Work");
        //      }

        

        // $(document).on('click', '.invoice-add-payment', function () {
        //     var invoice_id = $(this).data('invoice-id');
        //     var invoice_balance = $(this).data('invoice-balance');
        //     var invoice_payment_method = $(this).data('invoice-payment-method');
        //     var payment_cf_exist =  $(this).data('payment-cf-exist');
        //     $('#modal-placeholder').load("https://demo.invoiceplane.com/payments/ajax/modal_add_payment", {
        //         invoice_id: invoice_id,
        //         invoice_balance: invoice_balance,
        //         invoice_payment_method: invoice_payment_method,
        //         payment_cf_exist: payment_cf_exist
        //     });
        // });
    });
    
</script>
@stop

@section('js')
    <script>
    //$(function () {
    $(document).ready(function(){
        // $(document).on('click', '.btn_add_product', function () {
        //     alert('cmAddNew 4 click');
        // });
        
        $('button#cmAddProductBaruXX').click(function(){
            alert('cmAddNew 3y click');
            // $.ajax({
            //     url: 'http://localhost/lav11_invplanePdf/quotation/datatable/QE.1800785',
            //     context:document.body
            // })
            // .done(function(datatable){
            //     alert(datatable)
            //     $('table tbody').html(datatable);
            // })
        //var datatable = await fetch('http://localhost/lav11_invplanePdf/quotation/datatable/QE.1800785', method:'GET');
        // console.log(datatable);
            var datatable = '<tr><td>col1</td><td>col2</td><td>col3</td><td>col4</td></tr>';
            $('#grid tbody').append(datatable);
        })

        $('#cmAddNew').click(function(){
            alert('cmAddNew ');
        })
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
<div id="delete-quote" class="modal modal-lg" role="dialog" aria-labelledby="modal_delete_quote" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            <h4 class="panel-title">Delete Quote</h4>
        </div>
        <div class="modal-body">

            <div class="alert alert-danger">If you delete this quote you will not be able to recover it later. Are you sure you want to permanently delete this quote?</div>

        </div>
        <div class="modal-footer">
            <form action="https://demo.invoiceplane.com/quotes/delete/918"
                  method="POST">
                <input type="hidden" name="_ip_csrf" value="55bf919177c054f1b9cdbdea855a0517">
                <div class="btn-group">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o fa-margin"></i> Confirm deletion                    </button>
                    <a href="#" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-times"></i> Cancel                    </a>
                </div>
            </form>
        </div>
    </div>

</div>


<div id="add-quote-tax" class="modal modal-lg" role="dialog" aria-labelledby="modal_add_quote_tax" aria-hidden="true">
    <form class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            <h4 class="panel-title">Add Quote Tax</h4>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="tax_rate_id">
                    Tax Rate                </label>

                <div class="controls">
                    <select name="tax_rate_id" id="tax_rate_id" class="form-control simple-select" required>
                        <option value="0">None</option>
                                                    <option value="46">
                                -20,00% - IRPF                            </option>
                                                    <option value="15">
                                0,00% - Tax Free                            </option>
                                                    <option value="43">
                                0,00% - PA NO LABOR TAX                            </option>
                                                    <option value="36">
                                0,00% - DPH                            </option>
                                                    <option value="35">
                                0,00% - DPH                            </option>
                                                    <option value="62">
                                1,00% - Withholding                            </option>
                                                    <option value="55">
                                4,00% - XXX                            </option>
                                                    <option value="38">
                                5,00% - SGST                            </option>
                                                    <option value="50">
                                5,00% - TPS                            </option>
                                                    <option value="59">
                                5,00% - TPS                            </option>
                                                    <option value="29">
                                5,00% - CGST                            </option>
                                                    <option value="32">
                                6,00% - IVA                            </option>
                                                    <option value="45">
                                6,00% - PST                            </option>
                                                    <option value="42">
                                8,00% - PA SALES TAX                            </option>
                                                    <option value="39">
                                9,00% - TPS                            </option>
                                                    <option value="53">
                                9,75% - Butler County                            </option>
                                                    <option value="51">
                                9,98% - TVQ                            </option>
                                                    <option value="25">
                                10,00% - GST                            </option>
                                                    <option value="21">
                                10,00% - GST                            </option>
                                                    <option value="44">
                                11,00% - VAT                            </option>
                                                    <option value="61">
                                12,00% - VAT                            </option>
                                                    <option value="27">
                                13,00% - IVA                            </option>
                                                    <option value="49">
                                13,00% - HST                            </option>
                                                    <option value="56">
                                15,00% - ZIMRA                            </option>
                                                    <option value="52">
                                15,00% - GST                            </option>
                                                    <option value="47">
                                16,00% - Impuesto al Valor Agregado (IVA)                            </option>
                                                    <option value="41">
                                16,00% - VAT                            </option>
                                                    <option value="57">
                                18,00% - IGST                            </option>
                                                    <option value="26">
                                19,00% - Germany 19%                            </option>
                                                    <option value="58">
                                19,00% - TVA                            </option>
                                                    <option value="63">
                                20,00% - TVA                            </option>
                                                    <option value="40">
                                20,00% - TVA                            </option>
                                                    <option value="37">
                                20,00% - UK VAT 20%                            </option>
                                                    <option value="34">
                                20,00% - DPH                            </option>
                                                    <option value="28">
                                20,00% - Österreich 20% MWSt.                            </option>
                                                    <option value="30">
                                21,00% - IVA                            </option>
                                                    <option value="54">
                                22,00% - IVA 22                            </option>
                                                    <option value="33">
                                23,00% - Normal                            </option>
                                                    <option value="60">
                                25,00% - PDV                            </option>
                                                    <option value="31">
                                25,00% - IVA                            </option>
                                            </select>
                </div>
            </div>

            <div class="form-group">
                <label for="include_item_tax">
                    Tax Rate Placement                </label>

                <div class="controls">
                    <select name="include_item_tax" id="include_item_tax" class="form-control simple-select" required>
                        <option value="0">
                            Apply Before Item Tax                        </option>
                        <option value="1">
                            Apply After Item Tax                        </option>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <div class="btn-group">
                <button class="btn btn-success" id="quote_tax_submit" type="button">
                    <i class="fa fa-check"></i> Submit                </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cancel                </button>
            </div>
        </div>

    </form>

</div>

<div id="headerbar">
    <h1 class="headerbar-title">Form Quote #{{$data->TransNo ??''}}</h1>

    <div class="headerbar-item pull-right">
        <div class="btn-group btn-group-sm">
            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                Options <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="#add-quote-tax" data-toggle="modal">
                        <i class="fa fa-plus fa-margin"></i>
                        Add Quote Tax                    </a>
                </li>
                <li>
                    <a href="#" id="btn_generate_pdf"
                       data-quote-id="918">
                        <i class="fa fa-print fa-margin"></i>
                        Download PDF                    </a>
                </li>
                <li>
                    <a href="https://demo.invoiceplane.com/mailer/quote/918">
                        <i class="fa fa-send fa-margin"></i>
                        Send Email                    </a>
                </li>
                <li>
                    <a href="#" id="btn_quote_to_invoice"
                       data-quote-id="918">
                        <i class="fa fa-refresh fa-margin"></i>
                        Quote to Invoice                    </a>
                </li>
                <li>
                    <a href="#" id="btn_copy_quote"
                       data-quote-id="918"
                       data-client-id="390">
                        <i class="fa fa-copy fa-margin"></i>
                        Copy Quote                    </a>
                </li>
                <li>
                    <a href="#delete-quote" data-toggle="modal">
                        <i class="fa fa-trash-o fa-margin"></i> Delete                    </a>
                </li>
            </ul>
        </div>

        <a href="#" class="btn btn-success btn-sm ajax-loader" id="btn_save_quote">
            <i class="fa fa-check"></i>Edit</a>
    </div>

</div>

<div id="content">
        <div id="quote_form">
        <div class="quote">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">

                    <h3>
                        <a href="https://demo.invoiceplane.com/clients/view/390">{{$data->AccName??''}}</a>
                                                    <span id="quote_change_client" class="fa fa-edit cursor-pointer small"
                                  data-toggle="tooltip" data-placement="bottom"
                                  title="Change Client"></span>
                                            </h3>
                    <br>
                    <div class="client-address">
                        <span class="client-address-street-line">{{$data->ClientAddr->Address1??'--'}}<br></span>
                        <span class="client-address-street-line">{{$data->ClientAddr->Address2??'--'}}<br></span>
                        <span class="client-adress-town-line">{{$data->ClientAddr->Address3??'--'}}<br></span>
                        <span class="client-adress-country-line"><br>Indonesia</span>
                    </div>
                    <hr>
                    <div>Phone:&nbsp;{{$data->ClientAddr->Phone??'--'}}</div>
                    <div>Email:&nbsp;
    <script type="text/javascript">
	//<![CDATA[
	var l=new Array();
	l[0] = '>';
	l[1] = 'a';
	l[2] = '/';
	l[3] = '<';
	l[4] = '|109';
	l[5] = '|111';
	l[6] = '|99';
	l[7] = '|46';
	l[8] = '|100';
	l[9] = '|115';
	l[10] = '|97';
	l[11] = '|64';
	l[12] = '|116';
	l[13] = '|115';
	l[14] = '|101';
	l[15] = '|116';
	l[16] = '>';
	l[17] = '"';
	l[18] = '|109';
	l[19] = '|111';
	l[20] = '|99';
	l[21] = '|46';
	l[22] = '|100';
	l[23] = '|115';
	l[24] = '|97';
	l[25] = '|64';
	l[26] = '|116';
	l[27] = '|115';
	l[28] = '|101';
	l[29] = '|116';
	l[30] = ':';
	l[31] = 'o';
	l[32] = 't';
	l[33] = 'l';
	l[34] = 'i';
	l[35] = 'a';
	l[36] = 'm';
	l[37] = '"';
	l[38] = '=';
	l[39] = 'f';
	l[40] = 'e';
	l[41] = 'r';
	l[42] = 'h';
	l[43] = ' ';
	l[44] = 'a';
	l[45] = '<';

	for (var i = l.length-1; i >= 0; i=i-1) {
		if (l[i].substring(0, 1) === '|') document.write("&#"+unescape(l[i].substring(1))+";");
		else document.write(unescape(l[i]));
	}
	//]]>
</script>                        </div>
                    
                </div>

                <div class="col-xs-12 visible-xs"><br></div>

                <div class="col-xs-12 col-sm-6 col-md-7">
                    <div class="details-box">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">

                                <div class="quote-properties">
                                    <label for="quote_number">Quote #</label>
                                    <input type="text" id="quote_number" class="form-control input-sm bold" disabled value="{{$data->TransNo??''}}">
                                </div>
                                <div class="quote-properties has-feedback">
                                    <label for="quote_date_created">Date :</label>
                                    <input type="text" id="quote_number" class="form-control input-sm bold" disabled value="{{$data->TransDate??''}}">
                                    </div>
                                </div>
                                <div class="quote-properties has-feedback">
                                    <label for="quote_date_expires">Expires</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm bold" disabled value="17/21/2024">
                                    </div>
                                </div>

                                <!-- Custom fields -->
                                
                            </div>
                            <div class="col-xs-12 col-md-6">

                                <div class="quote-properties">
                                    <label for="quote_status_id">
                                        Status                                    </label>
                                        <input type="text" class="form-control input-sm" disabled value="17/21/2024">
                                </div>
                                <div class="quote-properties">
                                    <label for="quote_password">Quote PDF password (optional)</label>
                                    <input type="text" class="form-control input-sm" disabled value="12345">
                                </div>

                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            [table]-using hansontable
            <table id="grid" class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Unit</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php #dump($detail);?>
            @foreach($detail as $no=>$d)
                <tr>
                <th scope="row">{{$no+1}}</th>
                <td>{{$d->ProductCode??''}}</td> <!-- product -->
                <td>{{$d->UOM??''}}</td> <!-- unit -->
                <td>{{$d->Qty??''}}</td> <!-- qty -->
                <td>{{$d->Price??''}}</td> <!-- price -->
                <td>{{$d->Amount??''}}</td> <!-- amount -->
                <td class="">
                    <button class='btn btn-success' data-rowdata='{{ json_encode($d) }}' onclick='row_edit({{$d->id}}, $(this))' ><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class='btn btn-danger' onclick='row_delete({{$d->id}})'><i class="fa fa-window-close" aria-hidden="true"></i></button>
                </td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>

<br/>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="btn-group">
            <button id="cmAddNew" type="button" class="btn_add_row btn btn-sm btn-default"><i class="fa fa-plus"></i>Add new row</button>
            <button id="cmAddProductBaru" type="button" class="btn_add_product btn btn-sm btn-default"><i class="fa fa-database"></i>Add product12345</button>
        </div>
    </div>

    <div class="col-xs-12 visible-xs visible-sm"><br></div>

    <div class="col-xs-12 col-md-6 col-md-offset-2 col-lg-4 col-lg-offset-4">
        @php
            $taxrate=11;
            $taxamount = $subtotal*$taxrate/100;
            $total = $subtotal + $taxamount;
        @endphp
        <table class="table table-bordered text-right">
            <tr>
                <td style="width: 40%;">Subtotal</td>
                <td style="width: 60%;"class="amount">{{$subtotal??0}}</td>
            </tr>
            <tr>
                <td>Item Tax</td>
                <td class="amount">$0,00</td>
            </tr>
            <tr>
                <td>Quote Tax</td>
                <td>{{$taxamount}}</td>
            </tr>
            <tr>
                <td class="td-vert-middle">Discount</td>
                <td class="clearfix">
                    <div class="discount-field">
                        <div class="input-group input-group-sm">
                            <label for="quote_discount_amount" class="hidden">Amount</label>
                            <input type="text" id="quote_discount_amount" name="quote_discount_amount"
                                   class="discount-option form-control input-sm amount"
                                   value="">
                            <div class="input-group-addon">$</div>
                        </div>
                    </div>
                    <div class="discount-field">
                        <div class="input-group input-group-sm">
                            <label for="quote_discount_percent" class="hidden">Percentage</label>
                            <input type="text" id="quote_discount_percent" name="quote_discount_percent"
                                   class="discount-option form-control input-sm amount"
                                   value="">
                            <div class="input-group-addon">&percnt;</div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td><b>Total</b></td>
                <td class="amount"><b>{{$total??0}}</b></td>
            </tr>
        </table>
    </div>

</div>

        <hr/>

        <div class="row">
            <div class="col-xs-12 col-md-6">

                <div class="panel panel-default no-margin">
                    <div class="panel-heading">
                        Notes                    </div>
                    <div class="panel-body">
                        <textarea name="notes" id="notes" rows="3"
                                  class="input-sm form-control"></textarea>
                    </div>
                </div>

                <div class="col-xs-12 visible-xs visible-sm"><br></div>

            </div>
            <div class="col-xs-12 col-md-6">

                <div class="panel panel-default no-margin">

    <div class="panel-heading">
        Attachments    </div>

    <div class="panel-body clearfix">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <button type="button" class="btn btn-default fileinput-button"><i class="fa fa-plus"></i> Add Files...</button>

        <!-- dropzone -->
        <div class="row">
            <div id="actions" class="col-xs-12">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <!-- The global file processing state -->
                    <div class="fileupload-process">
                        <div id="total-progress" class="progress progress-striped active"
                             role="progressbar"
                             aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                            <div class="progress-bar progress-bar-success" style="width:0%;"
                                 data-dz-uploadprogress>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="previews" class="table table-condensed files no-margin">
                    <div id="template" class="file-row">
                        <!-- This is used as the file preview template -->
                        <div>
                                            <span class="preview">
                                                <img data-dz-thumbnail/>
                                            </span>
                        </div>
                        <div>
                            <p class="name" data-dz-name>
                            </p>
                            <strong class="error text-danger" data-dz-errormessage>
                            </strong>
                        </div>
                        <div>
                            <p class="size" data-dz-size>
                            </p>
                            <div class="progress progress-striped active"
                                 role="progressbar" aria-valuemin="0"
                                 aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success"
                                     style="" data-dz-uploadprogress>
                                </div>
                            </div>
                        </div>
                        <div class="pull-left btn-group">
                            <button data-dz-download class="btn btn-sm btn-primary">
                                <i class="fa fa-download"></i>
                                <span>Download</span>
                            </button>
                            <button data-dz-remove class="btn btn-danger btn-sm delete">
                                <i class="fa fa-trash-o"></i>
                                <span>Delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- stop dropzone -->

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

<!-- modal placeholder -->
<div class ="d-none">
    @include('components.modal.quotation_rowEdit')
</div>
@stop


@section('js2')
<script type="text/javascript">
    $(document).ready(function(){
        $('button#cmAddNew').click(function(){
            alert('cmAddNew ');
        })
        //$('.nav-tabs').tab();
        //$('.tip').tooltip();
        

        

        // $(document).on('click', '.invoice-add-payment', function () {
        //     var invoice_id = $(this).data('invoice-id');
        //     var invoice_balance = $(this).data('invoice-balance');
        //     var invoice_payment_method = $(this).data('invoice-payment-method');
        //     var payment_cf_exist =  $(this).data('payment-cf-exist');
        //     $('#modal-placeholder').load("https://demo.invoiceplane.com/payments/ajax/modal_add_payment", {
        //         invoice_id: invoice_id,
        //         invoice_balance: invoice_balance,
        //         invoice_payment_method: invoice_payment_method,
        //         payment_cf_exist: payment_cf_exist
        //     });
        // });
        //$(document).on('click', '.btn_add_product', function () {
            //alert('cmAddNew 4 click');
        //});
        
        $('button#cmAddProductBaru').click(function(){
            alert('cmAddNew 3x click');
            // $.ajax({
            //     url: 'http://localhost/lav11_invplanePdf/quotation/datatable/QE.1800785',
            //     context:document.body
            // })
            // .done(function(datatable){
            //     alert(datatable)
            //     $('table tbody').html(datatable);
            // })
        //var datatable = await fetch('http://localhost/lav11_invplanePdf/quotation/datatable/QE.1800785', method:'GET');
        // console.log(datatable);
            alert('add new line');
            var datatable = '<tr><td>col1</td><td>col2</td><td>col3</td><td>col4</td></tr>';
            $('#grid tbody').append(datatable);
        })

        
    });
</script>
@stop
