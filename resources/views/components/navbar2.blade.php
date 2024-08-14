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
                        <li><a href="http://localhost/lav7_invplane/quote/form" class="create-quote">Create Quote</a></li>
                        <li><a href="http://localhost/lav7_invplane/quote/list">View Quotes</a></li>
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
                        <li><a href="">View Invoices</a></li>
                        <li><a href="inv/list">View Recurring Invoices</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i> &nbsp;
                        <span class="hidden-md">Payments</span>
                        <i class="visible-md-inline fa fa-credit-card"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="payment/form">Enter Payment</a></li>
                        <li><a href="payment/list">View Payments</a></li>
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
                        <li><a href="products/form">Create product</a></li>
                        <li><a href="products/list">View Products</a></li>
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
                        <li><a href="tasks/form">Create Task</a></li>
                        <li><a href="tasks/list">View Tasks</a></li>
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

                            <script>
    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $(function () {
        $('#filter').keyup(function () {
            delay(function () {
                $.post('https://demo.invoiceplane.com/filter/ajax/filter_clients',
                    {
                        filter_query: $('#filter').val()
                    }, function (data) {
                                                $('#filter_results').html(data);
                    });
            }, 1000);
        });
    });
</script>                <form class="navbar-form navbar-left" role="search" onsubmit="return false;">
                    <div class="form-group">
                        <input id="filter" type="text" class="search-query form-control input-sm"
                               placeholder="Filter Clients">
                    </div>
                </form>
            
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