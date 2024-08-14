@extends('layouts.form_layout')

@section('js')
<link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css" type="text/css">
<link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css" type="text/css">
<!-- <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.js"></script>

<script>
    Dropzone.autoDiscover = false;

    
    $(function () {
        $('.nav-tabs').tab();
        $('.tip').tooltip();

        //ag-grid
        var mydata = [
                {"TransNo":"PI.1800001","InvNo":"","ProductCode":"DMO-22INC-NL-POLOS","ProductName":"DMO 22\" 51959 NL POLOS","Qty":"150.00","UOM":"","Price":"10455.00","DiscPercentD":0,"Cost":"10455.00","Memo":"","trans_id":1583,"id":145},
                {"TransNo":"PI.1800001","InvNo":"","ProductCode":"DMO-24INC-NL-POLOS","ProductName":"DMO 24\" 51959 NL POLOS","Qty":"3200.00","UOM":"","Price":"10909.00","DiscPercentD":0,"Cost":"10909.00","Memo":"","trans_id":1583,"id":146},
                {"TransNo":"PI.1800001","InvNo":"","ProductCode":"DMO-26INC-NL-POLOS","ProductName":"DMO 26\" 51959 NL POLOS","Qty":"150.00","UOM":"","Price":"11365.00","DiscPercentD":0,"Cost":"11365.00","Memo":"","trans_id":1583,"id":147},
                {"TransNo":"PI.1800001","InvNo":"","ProductCode":"DMO-30INC-NL-POLOS","ProductName":"DMO 30\" 51959 NL POLOS","Qty":"500.00","UOM":"","Price":"12273.00","DiscPercentD":0,"Cost":"12273.00","Memo":"","trans_id":1583,"id":148}
            ];
        var colModel = [
                { field:'checkboxBtn',headerName:'', checkboxSelection:true,headerCheckboxSelection:true,pinned:'left',width:50},
                { field:'ProductCode',headerName:'', checkboxSelection:true,headerCheckboxSelection:true,pinned:'left',width:50},
                { field: "ProductName", headerName: 'Product Name', width: 270 },
                { field: "Qty", headerName: 'Quantity', editable:true, edittype:'text', width: 80 },
                { field: "Price", headerName: 'Price', editable:true, edittype:'text', width: 120 },
                { field: "Amount", headerName: 'Amount', width: 120, format: 'Rp.##,###.00' },
                { headerName: '',  cellRenderer: function(row)  {
                        return `<button type='button' class='delete_btn' onclick='grid_delrow(${row.rowIndex})'>Delete</button>`;
                    }, 
                },
        ];
        var gridOptions = {
            columnDefs: colModel,
            rowData: mydata,
            caption: 'Grid Order',
            enableCellChangeFlash: true,
            editType: 'fullRow',
            //width: '100%', //width of grid
            //height: 400, //height of grid
            //onSelectRow: editRow,
            //editurl : 'clientarray', 
            //datatype: 'local',
            onRowEditingStarted: (event) => {
                console.log('never called - not doing row editing');
            },
            onRowEditingStopped: (event) => {
                console.log('never called - not doing row editing');
            },
            onCellEditingStarted: (event) => {
                console.log('cellEditingStarted');
            },
            onCellEditingStopped: (event) => {
                console.log('cellEditingStopped');
            },
            onGridReady: function (params) {
                sequenceId = 1;
                allOfTheData = [];
                for (var i = 0; i < 4; i++) {
                    //allOfTheData.push(createRowData(sequenceId++));
                    allOfTheData.push(mydata[i]);
                }
            },
            components: {
                btnCellRenderer: BtnCellRenderer,
                //numericCellEditor: NumericEditor,
                //moodCellRenderer: MoodRenderer,
                //moodEditor: MoodEditor,
            },
        }
        var xgd =  document.querySelector('#xgrid');
        new agGrid.Grid(xgd, gridOptions);


        $('body').on('focus', '.datepicker', function () {
            $(this).datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                language: 'en',
                weekStart: '1',
                todayBtn: "linked"
            });
        });

        $(document).on('click', '.create-invoice', function () {
            $('#modal-placeholder').load("invoices/ajax/modal_create_invoice");
        });

        $(document).on('click', '.create-quote', function () {
            $('#modal-placeholder').load("quotes/ajax/modal_create_quote");
        });

        $(document).on('click', '#btn_quote_to_invoice', function () {
            var quote_id = $(this).data('quote-id');
            $('#modal-placeholder').load("quotes/ajax/modal_quote_to_invoice/" + quote_id);
        });

        $(document).on('click', '#btn_copy_invoice', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("invoices/ajax/modal_copy_invoice", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_create_credit', function () {
            var invoice_id = $(this).data('invoice-id');
            $('#modal-placeholder').load("invoices/ajax/modal_create_credit", {invoice_id: invoice_id});
        });

        $(document).on('click', '#btn_copy_quote', function () {
            var quote_id = $(this).data('quote-id');
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("quotes/ajax/modal_copy_quote", {
                quote_id: quote_id,
                client_id: client_id
            });
        });

        $(document).on('click', '.client-create-invoice', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("invoices/ajax/modal_create_invoice", {client_id: client_id});
        });

        $(document).on('click', '.client-create-quote', function () {
            var client_id = $(this).data('client-id');
            $('#modal-placeholder').load("quotes/ajax/modal_create_quote", {client_id: client_id});
        });

        $(document).on('click', '.invoice-add-payment', function () {
            var invoice_id = $(this).data('invoice-id');
            var invoice_balance = $(this).data('invoice-balance');
            var invoice_payment_method = $(this).data('invoice-payment-method');
            var payment_cf_exist =  $(this).data('payment-cf-exist');
            $('#modal-placeholder').load("payments/ajax/modal_add_payment", {
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
            <a href="clients/index" title="Clients"
               class="tip" data-placement="right">
                <i class="fa fa-users"></i>
            </a>
        </li>
        <li>
            <a href="quotes/index" title="Quotes"
               class="tip" data-placement="right">
                <i class="fa fa-file"></i>
            </a>
        </li>
        <li>
            <a href="invoices/index" title="Invoices"
               class="tip" data-placement="right">
                <i class="fa fa-file-text"></i>
            </a>
        </li>
        <li>
            <a href="payments/index" title="Payments"
               class="tip" data-placement="right">
                <i class="fa fa-money"></i>
            </a>
        </li>
        <li>
            <a href="products/index" title="Products"
               class="tip" data-placement="right">
                <i class="fa fa-database"></i>
            </a>
        </li>
                <li>
            <a href="settings" title="System Settings"
               class="tip" data-placement="right">
                <i class="fa fa-cogs"></i>
            </a>
        </li>
    </ul>
</div>
    <div id="main-content">
        
<script>
    $(function () {
        $('.item-task-id').each(function () {
            // Disable client chaning if at least one item already has a task id assigned
            if ($(this).val().length > 0) {
                $('#invoice_change_client').hide();
                return false;
            }
        });

        $('.btn_add_product').click(function () {
            $('#modal-placeholder').load(
                "products/ajax/modal_product_lookups/" + Math.floor(Math.random() * 1000)
            );
        });

        $('.btn_add_task').click(function () {
            $('#modal-placeholder').load(
                "tasks/ajax/modal_task_lookups/2818/" +
                Math.floor(Math.random() * 1000)
            );
        });

        $('.btn_add_row').click(function () {
            $('#new_row').clone().appendTo('#item_table').removeAttr('id').addClass('item').show();
        });

                $('#new_row').clone().appendTo('#item_table').removeAttr('id').addClass('item').show();
        
        $('#btn_create_recurring').click(function () {
            $('#modal-placeholder').load(
                "invoices/ajax/modal_create_recurring",
                {
                    invoice_id: 2818                }
            );
        });

        $('#invoice_change_client').click(function () {
            $('#modal-placeholder').load("invoices/ajax/modal_change_client", {
                invoice_id: 2818,
                client_id: "393",
            });
        });

        $('#btn_save_invoice').click(function () {
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
            $.post("invoices/ajax/save", {
                    invoice_id: 2818,
                    invoice_number: $('#invoice_number').val(),
                    invoice_date_created: $('#invoice_date_created').val(),
                    invoice_date_due: $('#invoice_date_due').val(),
                    invoice_status_id: $('#invoice_status_id').val(),
                    invoice_password: $('#invoice_password').val(),
                    items: JSON.stringify(items),
                    invoice_discount_amount: $('#invoice_discount_amount').val(),
                    invoice_discount_percent: $('#invoice_discount_percent').val(),
                    invoice_terms: $('#invoice_terms').val(),
                    custom: $('input[name^=custom],select[name^=custom]').serializeArray(),
                    payment_method: $('#payment_method').val(),
                },
                function (data) {
                                        var response = JSON.parse(data);
                    if (response.success === 1) {
                        window.location = "invoices/view/" + 2818;
                    } else {
                        $('#fullpage-loader').hide();
                        $('.control-group').removeClass('has-error');
                        $('div.alert[class*="alert-"]').remove();
                        var resp_errors = response.validation_errors,
                            all_resp_errors = '';
                        for (var key in resp_errors) {
                            $('#' + key).parent().addClass('has-error');
                            all_resp_errors += resp_errors[key];
                        }
                        $('#invoice_form').prepend('<div class="alert alert-danger">' + all_resp_errors + '</div>');
                    }
                });
        });

        $('#btn_generate_pdf').click(function () {
            window.open('invoices/generate_pdf/2818', '_blank');
        });

        $(document).on('click', '.btn_delete_item', function () {
            var btn = $(this);
            var item_id = btn.data('item-id');

            // Just remove the row if no item ID is set (new row)
            if (typeof item_id === 'undefined') {
                $(this).parents('.item').remove();
            }

            $.post("invoices/ajax/delete_item/2818", {
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
        
        if ($('#invoice_discount_percent').val().length > 0) {
            $('#invoice_discount_amount').prop('disabled', true);
        }

        if ($('#invoice_discount_amount').val().length > 0) {
            $('#invoice_discount_percent').prop('disabled', true);
        }

        $('#invoice_discount_amount').keyup(function () {
            if (this.value.length > 0) {
                $('#invoice_discount_percent').prop('disabled', true);
            } else {
                $('#invoice_discount_percent').prop('disabled', false);
            }
        });
        $('#invoice_discount_percent').keyup(function () {
            if (this.value.length > 0) {
                $('#invoice_discount_amount').prop('disabled', true);
            } else {
                $('#invoice_discount_amount').prop('disabled', false);
            }
        });
        
        
    });
</script>

<div id="delete-invoice" class="modal modal-lg" role="dialog" aria-labelledby="delete-invoice" aria-hidden="true">

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            <h4 class="panel-title">Delete Invoice</h4>
        </div>
        <div class="modal-body">

            <div class="alert alert-danger">If you delete this invoice you will not be able to recover it later. Are you sure you want to permanently delete this invoice?</div>

        </div>
        <div class="modal-footer">

            <form action="invoices/delete/2818"
                  method="POST">
                <input type="hidden" name="_ip_csrf" value="d875c35dbe8fc76864dd3dc90e8e8920">
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
        // Select2 for all select inputs
        $(".simple-select").select2();

        $('#invoice_tax_submit').click(function () {
            $.post("invoices/ajax/save_invoice_tax_rate", {
                    invoice_id: 2818,
                    tax_rate_id: $('#tax_rate_id').val(),
                    include_item_tax: $('#include_item_tax').val()
                },
                function (data) {
                                        var response = JSON.parse(data);
                    if (response.success === 1) {
                        window.location = "invoices/view/" + 2818;
                    }
                });
        });
    });
</script>

<div id="add-invoice-tax" class="modal modal-lg" role="dialog" aria-labelledby="add-invoice-tax" aria-hidden="true">
    <form class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            <h4 class="panel-title">Add Invoice Tax</h4>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="tax_rate_id">Invoice Tax Rate: </label>
                <select name="tax_rate_id" id="tax_rate_id" class="form-control simple-select">
                    <option value="0">None</option>
                                            <option value="46">
                            -20.00% - IRPF                        </option>
                                            <option value="15">
                            0.00% - Tax Free                        </option>
                                            <option value="43">
                            0.00% - PA NO LABOR TAX                        </option>
                                            <option value="36">
                            0.00% - DPH                        </option>
                                            <option value="35">
                            0.00% - DPH                        </option>
                                            <option value="62">
                            1.00% - Withholding                        </option>
                                            <option value="55">
                            4.00% - XXX                        </option>
                                            <option value="38">
                            5.00% - SGST                        </option>
                                            <option value="50">
                            5.00% - TPS                        </option>
                                            <option value="59">
                            5.00% - TPS                        </option>
                                            <option value="29">
                            5.00% - CGST                        </option>
                                            <option value="32">
                            6.00% - IVA                        </option>
                                            <option value="45">
                            6.00% - PST                        </option>
                                            <option value="42">
                            8.00% - PA SALES TAX                        </option>
                                            <option value="39">
                            9.00% - TPS                        </option>
                                            <option value="53">
                            9.75% - Butler County                        </option>
                                            <option value="51">
                            9.98% - TVQ                        </option>
                                            <option value="25">
                            10.00% - GST                        </option>
                                            <option value="21">
                            10.00% - GST                        </option>
                                            <option value="44">
                            11.00% - VAT                        </option>
                                            <option value="61">
                            12.00% - VAT                        </option>
                                            <option value="27">
                            13.00% - IVA                        </option>
                                            <option value="49">
                            13.00% - HST                        </option>
                                            <option value="56">
                            15.00% - ZIMRA                        </option>
                                            <option value="52">
                            15.00% - GST                        </option>
                                            <option value="47">
                            16.00% - Impuesto al Valor Agregado (IVA)                        </option>
                                            <option value="41">
                            16.00% - VAT                        </option>
                                            <option value="57">
                            18.00% - IGST                        </option>
                                            <option value="26">
                            19.00% - Germany 19%                        </option>
                                            <option value="58">
                            19.00% - TVA                        </option>
                                            <option value="63">
                            20.00% - TVA                        </option>
                                            <option value="40">
                            20.00% - TVA                        </option>
                                            <option value="37">
                            20.00% - UK VAT 20%                        </option>
                                            <option value="34">
                            20.00% - DPH                        </option>
                                            <option value="28">
                            20.00% - Österreich 20% MWSt.                        </option>
                                            <option value="30">
                            21.00% - IVA                        </option>
                                            <option value="54">
                            22.00% - IVA 22                        </option>
                                            <option value="33">
                            23.00% - Normal                        </option>
                                            <option value="60">
                            25.00% - PDV                        </option>
                                            <option value="31">
                            25.00% - IVA                        </option>
                                    </select>
            </div>

            <div class="form-group">
                <label for="include_item_tax">Tax Rate Placement</label>
                <select name="include_item_tax" id="include_item_tax" class="form-control simple-select">
                    <option value="0">Apply Before Item Tax</option>
                    <option value="1">Apply After Item Tax</option>
                </select>
            </div>

        </div>

        <div class="modal-footer">
            <div class="btn-group">
                <button class="btn btn-success" id="invoice_tax_submit" type="button">
                    <i class="fa fa-check"></i> Submit                </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cancel                </button>
            </div>
        </div>

    </form>

</div>

<div id="headerbar">
    <h1 class="headerbar-title">
        Invoice #{{$data->TransNo??''}}    </h1>

    <div class="headerbar-item pull-right btn-group">

        <div class="options btn-group btn-group-sm">
            <a class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-caret-down no-margin"></i> Options            </a>
            <ul class="dropdown-menu">
                                    <li>
                        <a href="#add-invoice-tax" data-toggle="modal">
                            <i class="fa fa-plus fa-margin"></i> Add Invoice Tax                        </a>
                    </li>
                                <li>
                    <a href="#" id="btn_create_credit" data-invoice-id="2818">
                        <i class="fa fa-minus fa-margin"></i> Create credit invoice                    </a>
                </li>
                                <li>
                    <a href="#" id="btn_generate_pdf"
                       data-invoice-id="2818">
                        <i class="fa fa-print fa-margin"></i>
                        Download PDF                    </a>
                </li>
                <li>
                    <a href="mailer/invoice/2818">
                        <i class="fa fa-send fa-margin"></i>
                        Send Email                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" id="btn_create_recurring"
                       data-invoice-id="2818">
                        <i class="fa fa-refresh fa-margin"></i>
                        Create Recurring                    </a>
                </li>
                <li>
                    <a href="#" id="btn_copy_invoice"
                       data-invoice-id="2818">
                        <i class="fa fa-copy fa-margin"></i>
                        Copy Invoice                    </a>
                </li>
                                    <li>
                        <a href="#delete-invoice" data-toggle="modal">
                            <i class="fa fa-trash-o fa-margin"></i>
                            Delete                        </a>
                    </li>
                            </ul>
        </div>

                    <a href="#" class="btn btn-sm btn-success ajax-loader" id="btn_save_invoice">
                <i class="fa fa-check"></i> Save            </a>
            </div>

    <div class="headerbar-item invoice-labels pull-right">
                    </div>

</div>

<div id="content">

    
    <div id="invoice_form">
        <div class="invoice">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">

                    <h3>
                        <a href="clients/view/393">
                            amd a                        </a>
                                                    <span id="invoice_change_client" class="fa fa-edit cursor-pointer small"
                                  data-toggle="tooltip" data-placement="bottom"
                                  title="Change Client"></span>
                                            </h3>
                    <br>
                    <div class="client-address">
                        
<span class="client-address-street-line">
    a<br></span>
<span class="client-address-street-line">
    </span>
<span class="client-adress-town-line">
    a     a     12321321</span>
<span class="client-adress-country-line">
    <br>India</span>
                    </div>
                                            <hr>
                                                                <div>
                            Phone:&nbsp;
                            2313133.1321                        </div>
                                        
                </div>

                <div class="col-xs-12 visible-xs"><br></div>

                <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-6 col-md-offset-1">
                    <div class="details-box panel panel-default panel-body">
                        <div class="row">

                            
                            <div class="col-xs-12 col-md-6">

                                <div class="invoice-properties">
                                    <label>Invoice #</label>
                                    <input type="text" class="form-control input-sm disabled" disabled value="RE 07082024511">
                                </div>

                                <div class="invoice-properties has-feedback">
                                    <label>Date</label>

                                    <div class="input-group">
                                             <input type="text" class="form-control input-sm disabled" disabled value="{{$data->TransDate??''}}">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar fa-fw"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="invoice-properties has-feedback">
                                    <label>Due Date</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm disabled" disabled value="{{$data->DueDate??''}}">
                                        
                                        {{-- <span class="input-group-addon">
                                            <i class="fa fa-calendar fa-fw"></i>
                                        </span> --}}
                                    </div>
                                </div>

                                <!-- Custom fields -->
                                                                    
                            </div>

                            <div class="col-xs-12 col-md-6">

                                <div class="invoice-properties">
                                    <label>
                                        Status <span class="small">(Can be changed)</span>                                    </label>
                                    <input type="text" class="form-control input-sm disabled" disabled value="[status]">
                                </div>

                                <div class="invoice-properties">
                                    <label>Payment Method</label>
                                    <input type="text" class="form-control input-sm disabled" disabled value="[payment-method]">
                                </div>

                                <div class="invoice-properties">
                                    <label>PDF password (optional)</label>
                                     <input type="text" class="form-control input-sm disabled" disabled value="{{$data->PDFpassword??''}}">
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>

            </div>

            <br>

            
<!-- <div class="row">
    <div id="item_table" class="items table col-xs-12">
        <div id="new_row" class="form-group details-box" style="display: none;">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-6 col-lg-5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-1">
                            <button type="button" class="btn btn-link up" title="move up">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                            <button type="button" class="btn btn-link down" title="move down">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                                                        <button type="button" class="btn_delete_item btn btn-link btn-sm" title="Delete">
                                <i class="fa fa-trash-o text-danger"></i>
                            </button>
                        </div>

                        <div class="col-xs-12 col-sm-11">
                            <div class="input-group">
                                <label for="item_name" class="input-group-addon ig-addon-aligned">Item</label>
                                <input type="text" name="item_name" id="item_name" class="input-sm form-control" value="">
                            </div>
                                                            <div class="input-group">
                                    <label for="item_description" class="input-group-addon ig-addon-aligned">Description</label>
                                    <textarea name="item_description" id="item_description" class="input-sm form-control h135rem"></textarea>
                                </div>
                                                    </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-5 col-md-6 col-lg-7">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <div class="input-group">
                                <label for="item_quantity" class="input-group-addon ig-addon-aligned">Quantity</label>
                                <input type="text" name="item_quantity" id="item_quantity" class="input-sm form-control" value="">
                            </div>
                            <div class="input-group">
                                <label for="item_product_unit_id" class="input-group-addon ig-addon-aligned">Product Unit</label>
                                <select name="item_product_unit_id" id="item_product_unit_id" class="form-control input-sm">
                                    <option value="0">None</option>
                                                                            <option value="24">
                                            1RU/1RU                                        </option>
                                                                            <option value="20">
                                            Box/Boxes                                        </option>
                                                                            <option value="21">
                                            gal/Gallons                                        </option>
                                                                            <option value="13">
                                            Hour/Hours                                        </option>
                                                                            <option value="22">
                                            Kg/Kg                                        </option>
                                                                            <option value="16">
                                            Month/Month                                        </option>
                                                                            <option value="25">
                                            M²/Mètre carré                                        </option>
                                                                            <option value="26">
                                            night/nights                                        </option>
                                                                            <option value="27">
                                            Pezzo/Pezzi                                        </option>
                                                                            <option value="14">
                                            quart/quarts                                        </option>
                                                                            <option value="23">
                                            Record/Records                                        </option>
                                                                            <option value="15">
                                            Unidad/Unidades                                        </option>
                                                                            <option value="17">
                                            watt/watts                                        </option>
                                                                    </select>
                            </div>
                            <div class="input-group">
                                <label for="item_price" class="input-group-addon ig-addon-aligned">Price</label>
                                <input type="text" name="item_price" id="item_price" class="input-sm form-control" value="">
                                <div class="input-group-addon">$</div>
                            </div>
                            <div class="input-group">
                                <label for="item_discount_amount" class="input-group-addon ig-addon-aligned">Item Discount</label>
                                <input type="text" name="item_discount_amount" id="item_discount_amount" class="input-sm form-control"
                                       value="" data-toggle="tooltip" data-placement="bottom"
                                       title="$ per Item">
                                <div class="input-group-addon">$</div>
                            </div>
                            <div class="input-group">
                                <label for="item_tax_rate_id" class="input-group-addon ig-addon-aligned">Tax Rate</label>
                                 <input type="text" class="form-control input-sm disabled" disabled value="[taxrate]]">
                            </div>
                        </div>

                        <input type="hidden" name="invoice_id" value="2818">
                        <input type="hidden" name="item_id" value="">
                        <input type="hidden" name="item_product_id" value="">
                        <input type="hidden" name="item_task_id" class="item-task-id" value="">

                        <div class="col-xs-12 col-md-6 text-right">
                            <div class="row mb-1">
                                <div class="col-xs-9 col-sm-8">
                                    Subtotal:
                                </div>
                                <div class="col-xs-3 col-sm-4">
                                    <span name="subtotal"></span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-xs-9 col-sm-8">
                                    Discount:
                                </div>
                                <div class="col-xs-3 col-sm-4">
                                    <span name="item_discount_total"></span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-xs-9 col-sm-8">
                                    Tax:
                                </div>
                                <div class="col-xs-3 col-sm-4">
                                    <span name="item_tax_total"></span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <strong>
                                    <div class="col-xs-9 col-sm-8">
                                        Total:
                                    </div>
                                    <div class="col-xs-3 col-sm-4">
                                        <span name="item_total"></span>
                                    </div>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   </div>
</div>  -->

<br/>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="btn-group">
                            <a href="javascript:void(0);" class="btn_add_row btn btn-sm btn-default">
                    <i class="fa fa-plus"></i> Add new row                </a>
                <a href="javascript:void(0);" class="btn_add_product btn btn-sm btn-default">
                    <i class="fa fa-database"></i>
                    Add product                </a>
                <a href="javascript:void(0);" class="btn_add_task btn btn-sm btn-default">
                    <i class="fa fa-database"></i> Add task                </a>
                    </div>
    </div>

    <div class="col-xs-12 visible-xs visible-sm"><br></div>

    <div class="col-xs-12 col-md-6 col-md-offset-2 col-lg-4 col-lg-offset-4">
        <p>
        [AG-Grid]
        <div id="xgrid" class="ag-theme-alpine" style="height: 300px; width:100%;"></div>
        </p>
        <!-- <table class="table table-bordered text-right d-none">
            <tr>
                <td style="width: 40%;">Subtotal</td>
                <td style="width: 60%;"
                class="amount">0.00&nbsp;$</td>
            </tr>
            <tr>
                <td>Item Tax</td>
                <td class="amount">0.00&nbsp;$</td>
            </tr>
            <tr>
                <td>Invoice Tax</td>
                <td>
                    0.00&nbsp;$                </td>
            </tr>
            <tr>
                <td class="td-vert-middle">Discount</td>
                <td class="clearfix">
                    <div class="discount-field">
                        <div class="input-group input-group-sm">
                            <label for="invoice_discount_amount" class="hidden">Amount</label>
                            <input type="text" id="invoice_discount_amount" name="invoice_discount_amount"
                                   class="discount-option form-control input-sm amount"
                                   value="">
                            <div class="input-group-addon">$</div>
                        </div>
                    </div>
                    <div class="discount-field">
                        <div class="input-group input-group-sm">
                            <label for="invoice_discount_percent" class="hidden">Percentage</label>
                            <input type="text" id="invoice_discount_percent" name="invoice_discount_percent"
                                   class="discount-option form-control input-sm amount"
                                   value="">
                            <div class="input-group-addon">&percnt;</div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Total</td>
                <td class="amount"><b>0.00&nbsp;$</b></td>
            </tr>
            <tr>
                <td>Paid</td>
                <td class="amount"><b>0.00&nbsp;$</b></td>
            </tr>
            <tr>
                <td><b>Balance</b></td>
                <td class="amount"><b>0.00&nbsp;$</b></td>
            </tr>
        </table> -->
    </div>

</div>

            <hr/>

            <div class="row">
                <div class="col-xs-12 col-md-6">

                    <div class="panel panel-default no-margin">
                        <div class="panel-heading">
                            Invoice Terms                        </div>
                        <div class="panel-body">
                            <textarea id="invoice_terms" name="invoice_terms" class="form-control" rows="3"
                                                            ></textarea>
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
        <button type="button" class="btn btn-default fileinput-button">
            <i class="fa fa-plus"></i> Add Files...        </button>

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
                                 data-dz-uploadprogress></div>
                        </div>
                    </div>
                </div>

                <div id="previews" class="table table-condensed files no-margin">
                    <div id="template" class="file-row">
                        <!-- This is used as the file preview template -->
                        <div>
                            <span class="preview"><img data-dz-thumbnail/></span>
                        </div>
                        <div>
                            <p class="name" data-dz-name></p>
                            <strong class="error text-danger" data-dz-errormessage></strong>
                        </div>
                        <div>
                            <p class="size" data-dz-size></p>
                            <div class="progress progress-striped active" role="progressbar"
                                 aria-valuemin="0"
                                 aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style=""
                                     data-dz-uploadprogress></div>
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

                            <div class="row">
                    <div class="col-xs-12">

                        <hr>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Custom Fields                            </div>
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-xs-12 col-md-6">
                                                                                                                                                                                                                                                                        <div class="form-group">
        <div class="">
            <label                    for="custom[78]">
                ICD-10 Code            </label>
        </div>
                <div class="controls">
                        <input type="text" class="form-control"
                   name="custom[78]"
                   id="78"
                   value="">
                    </div>
    </div>
                                                                                                                            </div>
                                    <div class="col-xs-12 col-md-6">
                                                                                                                                                                                                                                                                                                </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            
        </div>

    </div>
</div>
@stop

