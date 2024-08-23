<!DOCTYPE html>
<html>
<link rel="stylesheet" href="http://localhost/lav11_invplanePdf/public/assets/css/bootstrap.min.css">

<head>
    <title>PDF Report</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
        }
        table, th, td {
             border: 1px solid black;
        }
        .table-date {
            float: right;
            display:inline-table
            width:30%;
            float:right;
            width:auto;
        }
        .table-date td {
            text-align: right;
            float:right;
        }
        .text-green {
            color: lime;
        }
        .float-right {
            float:right;
            text-align:end;
            margin-right:0;
        }
    </style>
</head>
<body>
    <h1>Sample PDF Report</h1>
    <p><b>ikan Keli</b></p>
    <p>VAT:GST Annuar</p>
    <p>Tax Code: LHDN 1234</p>
    <p>123</p>
    <p>building</p>
    <p>gotham gotham town 60000000</p>
    <p>Malaysia</p>
    <p></p>
    <p>P:1425tdf</p>
    <p></p>
    <p></p>
    <div style="width:100%">
        xxxxxxxx
        <table style="position:absolute;left:468px;top:218px;width:408px;height:135px;z-index:1;">
        <tr>
        <td>Invoice Date:</td>
        <td>23/03/2024</td>
        </tr>    
        <tr>
        <td>Due Date:</td>
        <td>23/03/2024</td>
        </tr>
        <tr>
        <td>Amount Due:</td>
        <td>$265.000,00</td>
        </tr>
        <tr>
        <td>Payment Method:</td>
        <td>Cash</td>
        </tr>
        </table>
    </div>
    <p></p>
    <p></p>
    <p></p>
    <h1 class='text-green'>Invoice 001</h1>
    <p>{{ $data }}</p>
    <p>
    <table border="0" cellpadding="1" cellspacing="1" style="width: 500px;" style="border:1px solid">
            {!!$table!!}
        </table>
    </p>
</body>
</html>
