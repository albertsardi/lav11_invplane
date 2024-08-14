<!DOCTYPE html>

<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <title>Fattouch Sanitaire</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="NOINDEX,NOFOLLOW">

<link rel="icon" type="image/png" href="https://demo.invoiceplane.com/assets/core/img/favicon.png">

<link rel="stylesheet" href="https://demo.invoiceplane.com/assets/invoiceplane/css/style.css?v=1.6.1">
<link rel="stylesheet" href="https://demo.invoiceplane.com/assets/core/css/custom.css?v=1.6.1">

    <link rel="stylesheet" href="https://demo.invoiceplane.com/assets/invoiceplane/css/monospace.css?v=1.6.1">

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
        
<script type="text/javascript">
    $(function () {
        $("#client_country").select2({
            placeholder: "Country",
            allowClear: true
        });
    });
</script>

<form method="post">

    <input type="hidden" name="_ip_csrf"
           value="6a9f4c46631f071867f7d668302c31ca">

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
            <div class="col-xs-12 col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading form-inline clearfix">
                        Personal Information
                        <div class="pull-right">
                            <label for="client_active" class="control-label">
                                Active                                <input id="client_active" name="client_active" type="checkbox" value="1"
                                    checked="checked">
                            </label>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <label for="client_name">Client Name</label>
                                <select name="client_language" id="client_language" class="form-control simple-select">
                                	<option value="system">Use System language</option>
                                    @foreach($mClient as $c)
                                        <option value="{{$c->AccCode}}">{{$c->AccName}}</option>
									@endforeach
                                 
                                ))}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="client_surname">
                                Client Surname (Optional)                            </label>
                            <input id="client_surname" name="client_surname" type="text" class="form-control"
                                   value="">
                        </div>

                        <div class="form-group no-margin">
                            <label for="client_language">
                                Language                            </label>
                            <select name="client_language" id="client_language" class="form-control simple-select">
                                <option value="system">
                                    Use System language                                </option>
                                    {dataLanguage.map((r)=>(
                                        <option value="{r.catid}">{r.name1}</option>
                                 
                                ))}
                            </select>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Address                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="client_address_1">Street Address</label>

                            <div class="controls">
                                <input type="text" name="client_address_1" id="client_address_1" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_address_2">Street Address (cont.)</label>

                            <div class="controls">
                                <input type="text" name="client_address_2" id="client_address_2" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_city">City</label>

                            <div class="controls">
                                <input type="text" name="client_city" id="client_city" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_state">State</label>

                            <div class="controls">
                                <input type="text" name="client_state" id="client_state" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_zip">Zip Code</label>

                            <div class="controls">
                                <input type="text" name="client_zip" id="client_zip" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_country">Country</label>

                            <div class="controls">
                                <select name="client_country" id="client_country" class="form-control">
                                    <option value="">None</option>
                                                                            <option value="AF"
                                                                                    >Afghanistan</option>
                                                                            <option value="AL"
                                                                                    >Albania</option>
                                                                            <option value="DZ"
                                                                                    >Algeria</option>
                                                                            <option value="AS"
                                                                                    >American Samoa</option>
                                                                            <option value="AD"
                                                                                    >Andorra</option>
                                                                            <option value="AO"
                                                                                    >Angola</option>
                                                                            <option value="AI"
                                                                                    >Anguilla</option>
                                                                            <option value="AQ"
                                                                                    >Antarctica</option>
                                                                            <option value="AG"
                                                                                    >Antigua and Barbuda</option>
                                                                            <option value="AR"
                                                                                    >Argentina</option>
                                                                            <option value="AM"
                                                                                    >Armenia</option>
                                                                            <option value="AW"
                                                                                    >Aruba</option>
                                                                            <option value="AU"
                                                                                    >Australia</option>
                                                                            <option value="AT"
                                                                                    >Austria</option>
                                                                            <option value="AZ"
                                                                                    >Azerbaijan</option>
                                                                            <option value="BS"
                                                                                    >Bahamas</option>
                                                                            <option value="BH"
                                                                                    >Bahrain</option>
                                                                            <option value="BD"
                                                                                    >Bangladesh</option>
                                                                            <option value="BB"
                                                                                    >Barbados</option>
                                                                            <option value="BY"
                                                                                    >Belarus</option>
                                                                            <option value="BE"
                                                                                    >Belgium</option>
                                                                            <option value="BZ"
                                                                                    >Belize</option>
                                                                            <option value="BJ"
                                                                                    >Benin</option>
                                                                            <option value="BM"
                                                                                    >Bermuda</option>
                                                                            <option value="BT"
                                                                                    >Bhutan</option>
                                                                            <option value="BO"
                                                                                    >Bolivia</option>
                                                                            <option value="BA"
                                                                                    >Bosnia and Herzegovina</option>
                                                                            <option value="BW"
                                                                                    >Botswana</option>
                                                                            <option value="BV"
                                                                                    >Bouvet Island</option>
                                                                            <option value="BR"
                                                                                    >Brazil</option>
                                                                            <option value="BQ"
                                                                                    >British Antarctic Territory</option>
                                                                            <option value="IO"
                                                                                    >British Indian Ocean Territory</option>
                                                                            <option value="VG"
                                                                                    >British Virgin Islands</option>
                                                                            <option value="BN"
                                                                                    >Brunei</option>
                                                                            <option value="BG"
                                                                                    >Bulgaria</option>
                                                                            <option value="BF"
                                                                                    >Burkina Faso</option>
                                                                            <option value="BI"
                                                                                    >Burundi</option>
                                                                            <option value="KH"
                                                                                    >Cambodia</option>
                                                                            <option value="CM"
                                                                                    >Cameroon</option>
                                                                            <option value="CA"
                                            selected="selected"                                        >Canada</option>
                                                                            <option value="CT"
                                                                                    >Canton and Enderbury Islands</option>
                                                                            <option value="CV"
                                                                                    >Cape Verde</option>
                                                                            <option value="KY"
                                                                                    >Cayman Islands</option>
                                                                            <option value="CF"
                                                                                    >Central African Republic</option>
                                                                            <option value="TD"
                                                                                    >Chad</option>
                                                                            <option value="CL"
                                                                                    >Chile</option>
                                                                            <option value="CN"
                                                                                    >China</option>
                                                                            <option value="CX"
                                                                                    >Christmas Island</option>
                                                                            <option value="CC"
                                                                                    >Cocos [Keeling] Islands</option>
                                                                            <option value="CO"
                                                                                    >Colombia</option>
                                                                            <option value="KM"
                                                                                    >Comoros</option>
                                                                            <option value="CG"
                                                                                    >Congo - Brazzaville</option>
                                                                            <option value="CD"
                                                                                    >Congo - Kinshasa</option>
                                                                            <option value="CK"
                                                                                    >Cook Islands</option>
                                                                            <option value="CR"
                                                                                    >Costa Rica</option>
                                                                            <option value="HR"
                                                                                    >Croatia</option>
                                                                            <option value="CU"
                                                                                    >Cuba</option>
                                                                            <option value="CY"
                                                                                    >Cyprus</option>
                                                                            <option value="CZ"
                                                                                    >Czech Republic</option>
                                                                            <option value="CI"
                                                                                    >Côte d’Ivoire</option>
                                                                            <option value="DK"
                                                                                    >Denmark</option>
                                                                            <option value="DJ"
                                                                                    >Djibouti</option>
                                                                            <option value="DM"
                                                                                    >Dominica</option>
                                                                            <option value="DO"
                                                                                    >Dominican Republic</option>
                                                                            <option value="NQ"
                                                                                    >Dronning Maud Land</option>
                                                                            <option value="EC"
                                                                                    >Ecuador</option>
                                                                            <option value="EG"
                                                                                    >Egypt</option>
                                                                            <option value="SV"
                                                                                    >El Salvador</option>
                                                                            <option value="GQ"
                                                                                    >Equatorial Guinea</option>
                                                                            <option value="ER"
                                                                                    >Eritrea</option>
                                                                            <option value="EE"
                                                                                    >Estonia</option>
                                                                            <option value="ET"
                                                                                    >Ethiopia</option>
                                                                            <option value="FK"
                                                                                    >Falkland Islands</option>
                                                                            <option value="FO"
                                                                                    >Faroe Islands</option>
                                                                            <option value="FJ"
                                                                                    >Fiji</option>
                                                                            <option value="FI"
                                                                                    >Finland</option>
                                                                            <option value="FR"
                                                                                    >France</option>
                                                                            <option value="GF"
                                                                                    >French Guiana</option>
                                                                            <option value="PF"
                                                                                    >French Polynesia</option>
                                                                            <option value="TF"
                                                                                    >French Southern Territories</option>
                                                                            <option value="FQ"
                                                                                    >French Southern and Antarctic Territories</option>
                                                                            <option value="GA"
                                                                                    >Gabon</option>
                                                                            <option value="GM"
                                                                                    >Gambia</option>
                                                                            <option value="GE"
                                                                                    >Georgia</option>
                                                                            <option value="DE"
                                                                                    >Germany</option>
                                                                            <option value="GH"
                                                                                    >Ghana</option>
                                                                            <option value="GI"
                                                                                    >Gibraltar</option>
                                                                            <option value="GR"
                                                                                    >Greece</option>
                                                                            <option value="GL"
                                                                                    >Greenland</option>
                                                                            <option value="GD"
                                                                                    >Grenada</option>
                                                                            <option value="GP"
                                                                                    >Guadeloupe</option>
                                                                            <option value="GU"
                                                                                    >Guam</option>
                                                                            <option value="GT"
                                                                                    >Guatemala</option>
                                                                            <option value="GG"
                                                                                    >Guernsey</option>
                                                                            <option value="GN"
                                                                                    >Guinea</option>
                                                                            <option value="GW"
                                                                                    >Guinea-Bissau</option>
                                                                            <option value="GY"
                                                                                    >Guyana</option>
                                                                            <option value="HT"
                                                                                    >Haiti</option>
                                                                            <option value="HM"
                                                                                    >Heard Island and McDonald Islands</option>
                                                                            <option value="HN"
                                                                                    >Honduras</option>
                                                                            <option value="HK"
                                                                                    >Hong Kong SAR China</option>
                                                                            <option value="HU"
                                                                                    >Hungary</option>
                                                                            <option value="IS"
                                                                                    >Iceland</option>
                                                                            <option value="IN"
                                                                                    >India</option>
                                                                            <option value="ID"
                                                                                    >Indonesia</option>
                                                                            <option value="IR"
                                                                                    >Iran</option>
                                                                            <option value="IQ"
                                                                                    >Iraq</option>
                                                                            <option value="IE"
                                                                                    >Ireland</option>
                                                                            <option value="IM"
                                                                                    >Isle of Man</option>
                                                                            <option value="IL"
                                                                                    >Israel</option>
                                                                            <option value="IT"
                                                                                    >Italy</option>
                                                                            <option value="JM"
                                                                                    >Jamaica</option>
                                                                            <option value="JP"
                                                                                    >Japan</option>
                                                                            <option value="JE"
                                                                                    >Jersey</option>
                                                                            <option value="JT"
                                                                                    >Johnston Island</option>
                                                                            <option value="JO"
                                                                                    >Jordan</option>
                                                                            <option value="KZ"
                                                                                    >Kazakhstan</option>
                                                                            <option value="KE"
                                                                                    >Kenya</option>
                                                                            <option value="KI"
                                                                                    >Kiribati</option>
                                                                            <option value="KW"
                                                                                    >Kuwait</option>
                                                                            <option value="KG"
                                                                                    >Kyrgyzstan</option>
                                                                            <option value="LA"
                                                                                    >Laos</option>
                                                                            <option value="LV"
                                                                                    >Latvia</option>
                                                                            <option value="LB"
                                                                                    >Lebanon</option>
                                                                            <option value="LS"
                                                                                    >Lesotho</option>
                                                                            <option value="LR"
                                                                                    >Liberia</option>
                                                                            <option value="LY"
                                                                                    >Libya</option>
                                                                            <option value="LI"
                                                                                    >Liechtenstein</option>
                                                                            <option value="LT"
                                                                                    >Lithuania</option>
                                                                            <option value="LU"
                                                                                    >Luxembourg</option>
                                                                            <option value="MO"
                                                                                    >Macau SAR China</option>
                                                                            <option value="MK"
                                                                                    >Macedonia</option>
                                                                            <option value="MG"
                                                                                    >Madagascar</option>
                                                                            <option value="MW"
                                                                                    >Malawi</option>
                                                                            <option value="MY"
                                                                                    >Malaysia</option>
                                                                            <option value="MV"
                                                                                    >Maldives</option>
                                                                            <option value="ML"
                                                                                    >Mali</option>
                                                                            <option value="MT"
                                                                                    >Malta</option>
                                                                            <option value="MH"
                                                                                    >Marshall Islands</option>
                                                                            <option value="MQ"
                                                                                    >Martinique</option>
                                                                            <option value="MR"
                                                                                    >Mauritania</option>
                                                                            <option value="MU"
                                                                                    >Mauritius</option>
                                                                            <option value="YT"
                                                                                    >Mayotte</option>
                                                                            <option value="FX"
                                                                                    >Metropolitan France</option>
                                                                            <option value="MX"
                                                                                    >Mexico</option>
                                                                            <option value="FM"
                                                                                    >Micronesia</option>
                                                                            <option value="MI"
                                                                                    >Midway Islands</option>
                                                                            <option value="MD"
                                                                                    >Moldova</option>
                                                                            <option value="MC"
                                                                                    >Monaco</option>
                                                                            <option value="MN"
                                                                                    >Mongolia</option>
                                                                            <option value="ME"
                                                                                    >Montenegro</option>
                                                                            <option value="MS"
                                                                                    >Montserrat</option>
                                                                            <option value="MA"
                                                                                    >Morocco</option>
                                                                            <option value="MZ"
                                                                                    >Mozambique</option>
                                                                            <option value="MM"
                                                                                    >Myanmar [Burma]</option>
                                                                            <option value="NA"
                                                                                    >Namibia</option>
                                                                            <option value="NR"
                                                                                    >Nauru</option>
                                                                            <option value="NP"
                                                                                    >Nepal</option>
                                                                            <option value="NL"
                                                                                    >The Netherlands</option>
                                                                            <option value="AN"
                                                                                    >Netherlands Antilles</option>
                                                                            <option value="NT"
                                                                                    >Neutral Zone</option>
                                                                            <option value="NC"
                                                                                    >New Caledonia</option>
                                                                            <option value="NZ"
                                                                                    >New Zealand</option>
                                                                            <option value="NI"
                                                                                    >Nicaragua</option>
                                                                            <option value="NE"
                                                                                    >Niger</option>
                                                                            <option value="NG"
                                                                                    >Nigeria</option>
                                                                            <option value="NU"
                                                                                    >Niue</option>
                                                                            <option value="NF"
                                                                                    >Norfolk Island</option>
                                                                            <option value="KP"
                                                                                    >North Korea</option>
                                                                            <option value="VD"
                                                                                    >North Vietnam</option>
                                                                            <option value="MP"
                                                                                    >Northern Mariana Islands</option>
                                                                            <option value="NO"
                                                                                    >Norway</option>
                                                                            <option value="OM"
                                                                                    >Oman</option>
                                                                            <option value="PC"
                                                                                    >Pacific Islands Trust Territory</option>
                                                                            <option value="PK"
                                                                                    >Pakistan</option>
                                                                            <option value="PW"
                                                                                    >Palau</option>
                                                                            <option value="PS"
                                                                                    >Palestinian Territories</option>
                                                                            <option value="PA"
                                                                                    >Panama</option>
                                                                            <option value="PZ"
                                                                                    >Panama Canal Zone</option>
                                                                            <option value="PG"
                                                                                    >Papua New Guinea</option>
                                                                            <option value="PY"
                                                                                    >Paraguay</option>
                                                                            <option value="YD"
                                                                                    >People's Democratic Republic of Yemen</option>
                                                                            <option value="PE"
                                                                                    >Peru</option>
                                                                            <option value="PH"
                                                                                    >Philippines</option>
                                                                            <option value="PN"
                                                                                    >Pitcairn Islands</option>
                                                                            <option value="PL"
                                                                                    >Poland</option>
                                                                            <option value="PT"
                                                                                    >Portugal</option>
                                                                            <option value="PR"
                                                                                    >Puerto Rico</option>
                                                                            <option value="QA"
                                                                                    >Qatar</option>
                                                                            <option value="RO"
                                                                                    >Romania</option>
                                                                            <option value="RU"
                                                                                    >Russia</option>
                                                                            <option value="RW"
                                                                                    >Rwanda</option>
                                                                            <option value="RE"
                                                                                    >Réunion</option>
                                                                            <option value="BL"
                                                                                    >Saint Barthélemy</option>
                                                                            <option value="SH"
                                                                                    >Saint Helena</option>
                                                                            <option value="KN"
                                                                                    >Saint Kitts and Nevis</option>
                                                                            <option value="LC"
                                                                                    >Saint Lucia</option>
                                                                            <option value="MF"
                                                                                    >Saint Martin</option>
                                                                            <option value="PM"
                                                                                    >Saint Pierre and Miquelon</option>
                                                                            <option value="VC"
                                                                                    >Saint Vincent and the Grenadines</option>
                                                                            <option value="WS"
                                                                                    >Samoa</option>
                                                                            <option value="SM"
                                                                                    >San Marino</option>
                                                                            <option value="SA"
                                                                                    >Saudi Arabia</option>
                                                                            <option value="SN"
                                                                                    >Senegal</option>
                                                                            <option value="RS"
                                                                                    >Serbia</option>
                                                                            <option value="CS"
                                                                                    >Serbia and Montenegro</option>
                                                                            <option value="SC"
                                                                                    >Seychelles</option>
                                                                            <option value="SL"
                                                                                    >Sierra Leone</option>
                                                                            <option value="SG"
                                                                                    >Singapore</option>
                                                                            <option value="SK"
                                                                                    >Slovakia</option>
                                                                            <option value="SI"
                                                                                    >Slovenia</option>
                                                                            <option value="SB"
                                                                                    >Solomon Islands</option>
                                                                            <option value="SO"
                                                                                    >Somalia</option>
                                                                            <option value="ZA"
                                                                                    >South Africa</option>
                                                                            <option value="GS"
                                                                                    >South Georgia and the South Sandwich Islands</option>
                                                                            <option value="KR"
                                                                                    >South Korea</option>
                                                                            <option value="ES"
                                                                                    >Spain</option>
                                                                            <option value="LK"
                                                                                    >Sri Lanka</option>
                                                                            <option value="SD"
                                                                                    >Sudan</option>
                                                                            <option value="SR"
                                                                                    >Suriname</option>
                                                                            <option value="SJ"
                                                                                    >Svalbard and Jan Mayen</option>
                                                                            <option value="SZ"
                                                                                    >Swaziland</option>
                                                                            <option value="SE"
                                                                                    >Sweden</option>
                                                                            <option value="CH"
                                                                                    >Switzerland</option>
                                                                            <option value="SY"
                                                                                    >Syria</option>
                                                                            <option value="ST"
                                                                                    >São Tomé and Príncipe</option>
                                                                            <option value="TW"
                                                                                    >Taiwan</option>
                                                                            <option value="TJ"
                                                                                    >Tajikistan</option>
                                                                            <option value="TZ"
                                                                                    >Tanzania</option>
                                                                            <option value="TH"
                                                                                    >Thailand</option>
                                                                            <option value="TL"
                                                                                    >Timor-Leste</option>
                                                                            <option value="TG"
                                                                                    >Togo</option>
                                                                            <option value="TK"
                                                                                    >Tokelau</option>
                                                                            <option value="TO"
                                                                                    >Tonga</option>
                                                                            <option value="TT"
                                                                                    >Trinidad and Tobago</option>
                                                                            <option value="TN"
                                                                                    >Tunisia</option>
                                                                            <option value="TR"
                                                                                    >Turkey</option>
                                                                            <option value="TM"
                                                                                    >Turkmenistan</option>
                                                                            <option value="TC"
                                                                                    >Turks and Caicos Islands</option>
                                                                            <option value="TV"
                                                                                    >Tuvalu</option>
                                                                            <option value="UM"
                                                                                    >U.S. Minor Outlying Islands</option>
                                                                            <option value="PU"
                                                                                    >U.S. Miscellaneous Pacific Islands</option>
                                                                            <option value="VI"
                                                                                    >U.S. Virgin Islands</option>
                                                                            <option value="UG"
                                                                                    >Uganda</option>
                                                                            <option value="UA"
                                                                                    >Ukraine</option>
                                                                            <option value="SU"
                                                                                    >Union of Soviet Socialist Republics</option>
                                                                            <option value="AE"
                                                                                    >United Arab Emirates</option>
                                                                            <option value="GB"
                                                                                    >United Kingdom</option>
                                                                            <option value="US"
                                                                                    >United States</option>
                                                                            <option value="ZZ"
                                                                                    >Unknown or Invalid Region</option>
                                                                            <option value="UY"
                                                                                    >Uruguay</option>
                                                                            <option value="UZ"
                                                                                    >Uzbekistan</option>
                                                                            <option value="VU"
                                                                                    >Vanuatu</option>
                                                                            <option value="VA"
                                                                                    >Vatican City</option>
                                                                            <option value="VE"
                                                                                    >Venezuela</option>
                                                                            <option value="VN"
                                                                                    >Vietnam</option>
                                                                            <option value="WK"
                                                                                    >Wake Island</option>
                                                                            <option value="WF"
                                                                                    >Wallis and Futuna</option>
                                                                            <option value="EH"
                                                                                    >Western Sahara</option>
                                                                            <option value="YE"
                                                                                    >Yemen</option>
                                                                            <option value="ZM"
                                                                                    >Zambia</option>
                                                                            <option value="ZW"
                                                                                    >Zimbabwe</option>
                                                                            <option value="AX"
                                                                                    >Åland Islands</option>
                                                                    </select>
                            </div>
                        </div>

                        <!-- Custom Fields -->
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
                                <input type="text" name="client_phone" id="client_phone" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_fax">Fax Number</label>

                            <div class="controls">
                                <input type="text" name="client_fax" id="client_fax" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_mobile">Mobile Number</label>

                            <div class="controls">
                                <input type="text" name="client_mobile" id="client_mobile" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_email">Email Address</label>

                            <div class="controls">
                                <input type="text" name="client_email" id="client_email" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_web">Web Address</label>

                            <div class="controls">
                                <input type="text" name="client_web" id="client_web" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <!-- Custom fields -->
                                                                                                                <div class="form-group">
        <div class="">
            <label                    for="custom[70]">
                SOmething cool            </label>
        </div>
                <div class="controls">
                        <input type="text" class="form-control"
                   name="custom[70]"
                   id="70"
                   value="">
                    </div>
    </div>
                                                                            </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Personal Information                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="client_gender">Gender</label>

                            <div class="controls">
                                <select name="client_gender" id="client_gender"
                                	class="form-control simple-select" data-minimum-results-for-search="Infinity">
                                                                            <option value=" 0" >
                                            Male                                        </option>
                                                                            <option value=" 1" >
                                            Female                                        </option>
                                                                            <option value=" 2" >
                                            Other                                        </option>
                                                                    </select>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="client_birthdate">Birthdate</label>
                                                        <div class="input-group">
                                <input type="text" name="client_birthdate" id="client_birthdate"
                                       class="form-control datepicker"
                                       value="">
                                <span class="input-group-addon">
                                <i class="fa fa-calendar fa-fw"></i>
                            </span>
                            </div>
                        </div>

                        
                        <!-- Custom fields -->
                                                                                                                                </div>

                </div>

            </div>
            <div class="col-xs-12 col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Taxes Information                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="client_vat_id">VAT ID</label>

                            <div class="controls">
                                <input type="text" name="client_vat_id" id="client_vat_id" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client_tax_code">Taxes Code</label>

                            <div class="controls">
                                <input type="text" name="client_tax_code" id="client_tax_code" class="form-control"
                                       value="">
                            </div>
                        </div>

                        <!-- Custom fields -->
                                                                                                                                </div>

                </div>

            </div>
        </div>
                    <div class="row">
                <div class="col-xs-12 col-md-6">

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Custom Fields                        </div>

                        <div class="panel-body">
                                                                <div class="form-group">
        <div class="">
            <label                    for="custom[68]">
                Client Address            </label>
        </div>
                <div class="controls">
                        <input type="text" class="form-control"
                   name="custom[68]"
                   id="68"
                   value="">
                    </div>
    </div>
                                                                                                    <div class="form-group">
        <div class="">
            <label                    for="custom[64]">
                Test            </label>
        </div>
                <div class="controls">
                            <select id="64"
                        name="custom[64][]"
                        multiple="multiple"
                        class="form-control">
                    <option value="">None</option>
                                            <option value="15" >
                            Aaa                        </option>
                                            <option value="16" >
                            Ddd                        </option>
                                            <option value="17" >
                            Ggg                        </option>
                                    </select>
                <script>
                    $('#64').select2();
                </script>
                    </div>
    </div>
                                                        </div>

                    </div>
                </div>
            </div>
            </div>
</form>
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


</body>
</html>


<script>

