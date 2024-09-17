@extends('layouts.form_layout')

@section('js')
<!-- section js -->
<script lang="javascript" src="http://localhost/lav11_invplanePdf/resources/js/editgrid.js"></script>
<!-- use version 0.20.2 -->
<script lang="javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" type="text/css" />
<!-- use bootbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    Dropzone.autoDiscover = false;

    
    $(function () {
        //$('.nav-tabs').tab();
        //$('.tip').tooltip();

        // init grid
        const container = document.querySelector('#example');

        // https://handsontable.com/docs/javascript-data-grid/installation/#_1-install-handsontable
        var data = [
                ['#','Product','Unit','qty','price','amount','subtotal'],
                ['2019', 10, 11, 12, 13],
                ['2020', 20, 11, 14, 13],
                ['2021', 30, 15, 12, 13]
            ];
        var data2 = {!!json_encode($detail)!!}
        const hot = new Handsontable(container, {
            data: data2,
            rowHeaders: true,
            colHeaders: true,
            height: 'auto',
            autoWrapRow: true,
            autoWrapCol: true,
            licenseKey: 'non-commercial-and-evaluation', // for non-commercial use only
            afterChange: function(changes, src) {
                if (src !== 'loadData') {
                    console.log('Row index: ' + changes[0][0])
                    console.log(changes)
                }
    }
        });
        hot.addHook('edit',(row,amount)=> {
            console.log('edit '+row+' '+amount)
        })
        // const hot1 = new Handsontable(document.getElementById('example'), {
        //     afterChange: function(changes, source) {
        //         // $.ajax({
        //         //     url: "save.php',
        //         //     data: change
        //         // });
        //         console.log('afterChange');
        //     }
        // });

        $('body').on('focus', '.datepicker', function () {
            $(this).datepicker({
                autoclose: true,
                format: 'mm/dd/yyyy',
                language: 'en',
                weekStart: '0',
                todayBtn: "linked"
            });
        });

        //cmAddNew
        $(document).on('click', 'button#cmAddNew', function () {
            alert('cm add new');
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
        
        $('#cmAddNew').click(function(){
            alert('cmAddNew click');
        })
        

    });
    function row_edit(id) {
        //alert('row2 edit '+id)
        var form = $('#modal_rowForm').html()
        bootbox.alert(form, function(){
            var username = form.find('input[name=usernameInput]').val();
            console.log(username);
        });
    }
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
        <script>

    $(function () {
        $('.btn_add_product').click(function () {
            $('#modal-placeholder').load(
                "https://demo.invoiceplane.com/products/ajax/modal_product_lookups/" +
                    Math.floor(Math.random() * 1000)
            );
        });

        $('.btn_add_row').click(function () {
            $('#new_row').clone().appendTo('#item_table').removeAttr('id').addClass('item').show();
        });

        $('#quote_change_client').click(function () {
            $('#modal-placeholder').load("https://demo.invoiceplane.com/quotes/ajax/modal_change_client", {
                quote_id: 918,
                client_id: "390",
            });
        });

                $('#new_row').clone().appendTo('#item_table').removeAttr('id').addClass('item').show();
        
        $('#btn_save_quote').click(function () {
            var items = [];
            var item_order = 1;
            $('#item_table .item').each(function () {
                var row = {};
                $(this).find('input,select,textarea').each(function () {
                    if ($(this).is(':checkbox')) {
                        row[$(this).attr('name')] = $(this).is(':checked');
                    } else {
                        row[$(this).attr('name')] = $(this).val();
                    }
                });
                row['item_order'] = item_order;
                item_order++;
                items.push(row);
            });
            $.post("https://demo.invoiceplane.com/quotes/ajax/save", {
                    quote_id: 918,
                    quote_number: $('#quote_number').val(),
                    quote_date_created: $('#quote_date_created').val(),
                    quote_date_expires: $('#quote_date_expires').val(),
                    quote_status_id: $('#quote_status_id').val(),
                    quote_password: $('#quote_password').val(),
                    items: JSON.stringify(items),
                    quote_discount_amount: $('#quote_discount_amount').val(),
                    quote_discount_percent: $('#quote_discount_percent').val(),
                    notes: $('#notes').val(),
                    custom: $('input[name^=custom],select[name^=custom]').serializeArray(),
                },
                function (data) {
                                        var response = JSON.parse(data);
                    if (response.success === 1) {
                        window.location = "https://demo.invoiceplane.com/quotes/view/" + 918;
                    } else {
                        $('#fullpage-loader').hide();
                        $('.control-group').removeClass('has-error');
                        $('div.alert[class*="alert-"]').remove();
                        var resp_errors = response.validation_errors,
                            all_resp_errors = '';

                        if (typeof(resp_errors) == 'string') {
                            all_resp_errors = resp_errors;
                        } else {
                            for (var key in resp_errors) {
                                $('#' + key).parent().addClass('has-error');
                                all_resp_errors += resp_errors[key];
                            }
                        }

                        $('#quote_form').prepend('<div class="alert alert-danger">' + all_resp_errors + '</div>');
                    }
                });
        });

        $(document).on('click', '.btn_delete_item', function () {
            var btn = $(this);
            var item_id = btn.data('item-id');

            // Just remove the row if no item ID is set (new row)
            if (typeof item_id === 'undefined') {
                $(this).parents('.item').remove();
            }

            $.post("https://demo.invoiceplane.com/quotes/ajax/delete_item/918", {
                    'item_id': item_id,
                },
                function (data) {
                                        var response = JSON.parse(data);

                    if (response.success === 1) {
                        btn.parents('.item').remove();
                    } else {
                        btn.removeClass('btn-link').addClass('btn-danger').prop('disabled', true);
                    }
                });
        });

        $('#btn_generate_pdf').click(function () {
            window.open('https://demo.invoiceplane.com/quotes/generate_pdf/918', '_blank');
        });

        $(document).ready(function () {
            if ($('#quote_discount_percent').val().length > 0) {
                $('#quote_discount_amount').prop('disabled', true);
            }
            if ($('#quote_discount_amount').val().length > 0) {
                $('#quote_discount_percent').prop('disabled', true);
            }
            $('#cmAddNew').click(function () {
                alert('add new line')
            });
        });
        $('#quote_discount_amount').keyup(function () {
            if (this.value.length > 0) {
                $('#quote_discount_percent').prop('disabled', true);
            } else {
                $('#quote_discount_percent').prop('disabled', false);
            }
        });
        $('#quote_discount_percent').keyup(function () {
            if (this.value.length > 0) {
                $('#quote_discount_amount').prop('disabled', true);
            } else {
                $('#quote_discount_amount').prop('disabled', false);
            }
        });

        

                    function UpR(k) {
              var parent = k.parents('.item');
              var pos = parent.prev();
              parent.insertBefore(pos);
            }
            function DownR(k) {
              var parent = k.parents('.item');
              var pos = parent.next();
              parent.insertAfter(pos);
            }
            $(document).on('click', '.up', function () {
              UpR($(this));
            });
            $(document).on('click', '.down', function () {
              DownR($(this));
            });
           
    });

    function row_edit(id) {
        alert('row2 edit '+id);
        var form = $('#modal-quotation-row-edit').html();
        bootbox.confirm(form, function(result){
            alert(result);
        })
    }
    function row_delete(id) {
        //alert('row2 delete '+id);
        bootbox.alert('row delete '+id);
    }
    
        
</script>

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
<script>
    $(function () {
        $('#quote_tax_submit').click(function () {
            $.post("https://demo.invoiceplane.com/quotes/ajax/save_quote_tax_rate", {
                    quote_id: 918,
                    tax_rate_id: $('#tax_rate_id').val(),
                    include_item_tax: $('#include_item_tax').val()
                },
                function (data) {
                                        var response = JSON.parse(data);
                    if (response.success === 1) {
                        window.location = "https://demo.invoiceplane.com/quotes/view/" + 918;
                    }
                });
        });
    });
</script>

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
    <h1 class="headerbar-title">Quote #{{$data->TransNo ??''}}</h1>

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
            <table class="table">
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
            <?php dump($detail);?>
            @foreach($detail as $no=>$d)
                <tr>
                <th scope="row">{{$no+1}}</th>
                <td>{{$d->ProductCode??''}}</td> <!-- product -->
                <td>{{$d->UOM??''}}</td> <!-- unit -->
                <td>{{$d->Qty??''}}</td> <!-- qty -->
                <td>{{$d->Price??''}}</td> <!-- price -->
                <td>{{$d->Amount??''}}</td> <!-- amount -->
                <td class="">
                    <button class='btn btn-success' onclick='row_edit({{$d->id}})'><i class="fa fa-pencil" aria-hidden="true"></i></button>
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
            <button id="cmAddProduct" type="button" class="btn_add_product btn btn-sm btn-default"><i class="fa fa-database"></i>Add product</button>
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

<script>
    function getIcon(fullname) {
        var fileFormat = fullname.match(/\.([A-z0-9]{1,5})$/);
        if (fileFormat) {
            fileFormat = fileFormat[1];
        }
        else {
            fileFormat = '';
        }

        var fileIcon = 'default';

        switch (fileFormat) {
            case 'pdf':
                fileIcon = 'file-pdf';
                break;

            case 'mp3':
            case 'wav':
            case 'ogg':
                fileIcon = 'file-audio';
                break;

            case 'doc':
            case 'docx':
            case 'odt':
                fileIcon = 'file-document';
                break;

            case 'xls':
            case 'xlsx':
            case 'ods':
                fileIcon = 'file-spreadsheet';
                break;

            case 'ppt':
            case 'pptx':
            case 'odp':
                fileIcon = 'file-presentation';
                break;
        }
        return fileIcon;
    }

    // Get the template HTML and remove it from the document
    var previewNode = document.querySelector('#template');
    previewNode.id = '';
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: 'https://demo.invoiceplane.com/upload/upload_file/390/97ueNaImspH0KlTASvnC2jYyXFwB4hJq',
        params: {
            '_ip_csrf': Cookies.get('ip_csrf_cookie'),
        },
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        uploadMultiple: false,
        previewTemplate: previewTemplate,
        autoQueue: true, // Make sure the files aren't queued until manually added
        previewsContainer: '#previews', // Define the container to display the previews
        clickable: '.fileinput-button', // Define the element that should be used as click trigger to select files.
        init: function () {
            thisDropzone = this;
            $.getJSON('https://demo.invoiceplane.com/upload/upload_file/390/97ueNaImspH0KlTASvnC2jYyXFwB4hJq',
                function (data) {
                    $.each(data, function (index, val) {
                        var mockFile = {fullname: val.fullname, size: val.size, name: val.name};

                        thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                        createDownloadButton(mockFile, 'https://demo.invoiceplane.com/upload/get_file/' + val.fullname);

                        if (val.fullname.match(/\.(jpg|jpeg|png|gif)$/)) {
                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile,
                                'https://demo.invoiceplane.com/upload/get_file/' + val.fullname);
                        }
                        else {
                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile,
                                'https://demo.invoiceplane.com/assets/default/img/favicon.png');
                        }

                        thisDropzone.emit('complete', mockFile);
                        thisDropzone.emit('success', mockFile);
                    });
                });
        },
    });

    myDropzone.on('addedfile', function (file) {
        myDropzone.emit('thumbnail', file, 'https://demo.invoiceplane.com/assets/default/img/favicon.png');
        createDownloadButton(file, 'https://demo.invoiceplane.com/upload/get_file/97ueNaImspH0KlTASvnC2jYyXFwB4hJq_' +
            file.name.replace(/\s+/g, '_'));
    });

    // Update the total progress bar
    myDropzone.on('totaluploadprogress', function (progress) {
        document.querySelector('#total-progress .progress-bar').style.width = progress + '%';
    });

    myDropzone.on('sending', function (file) {
        // Show the total progress bar when upload starts
        document.querySelector('#total-progress').style.opacity = '1';
    });

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on('queuecomplete', function (progress) {
        document.querySelector('#total-progress').style.opacity = '0';
    });

    myDropzone.on('removedfile', function (file) {
        $.post({
            url: 'https://demo.invoiceplane.com/upload/delete_file/97ueNaImspH0KlTASvnC2jYyXFwB4hJq',
            data: {
                name: file.name,
                _ip_csrf: Cookies.get('ip_csrf_cookie')
            }
        });
    });

    function createDownloadButton(file, fileUrl) {
        var downloadButtonList = file.previewElement.querySelectorAll('[data-dz-download]');
        for (var $i = 0; $i < downloadButtonList.length; $i++) {
            downloadButtonList[$i].addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                location.href = fileUrl;
                return false;
            });
        }
    }
</script>
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

<script defer src="https://demo.invoiceplane.com/assets/core/js/scripts.js"></script>

@stop
