<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .company-info, .client-info {
            margin-bottom: 20px;
        }
        .company-info h2, .client-info h2 {
            margin: 0;
            font-size: 18px;
        }
        .company-info p, .client-info p {
            margin: 5px 0;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Invoice</h1>
        </div>
        <div class="company-info">
            <h2>Company Name</h2>
            <p>Address Line 1</p>
            <p>Address Line 2</p>
            <p>City, State, ZIP</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: contact@company.com</p>
        </div>
        <div class="client-info">
            <h2>Client Name</h2>
            <p>Client Address Line 1</p>
            <p>Client Address Line 2</p>
            <p>Client City, State, ZIP</p>
            <p>Client Phone: (098) 765-4321</p>
            <p>Client Email: client@client.com</p>
        </div>
        <div class="invoice-details">
            <p><strong>Invoice Number:</strong> INV-12345</p>
            <p><strong>Invoice Date:</strong> August 22, 2024</p>
            <p><strong>Due Date:</strong> September 22, 2024</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Item Description 1</td>
                    <td>1</td>
                    <td>$100.00</td>
                    <td>$100.00</td>
                </tr>
                <tr>
                    <td>Item Description 2</td>
                    <td>2</td>
                    <td>$50.00</td>
                    <td>$100.00</td>
                </tr>
                <!-- Add more items as needed -->
            </tbody>
        </table>
        <div class="total">
            <p><strong>Subtotal:</strong> $200.00</p>
            <p><strong>Tax (10%):</strong> $20.00</p>
            <p><strong>Total Amount Due:</strong> $220.00</p>
        </div>
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>If you have any questions regarding this invoice, please contact us at (123) 456-7890 or email us at contact@company.com.</p>
        </div>
    </div>
</body>
</html>
