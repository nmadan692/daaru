<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Invoice PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 13px;
            line-height: 18px;
            font-weight: 400;
            color: #000;
            background: #ffffff;
        }

        table tr td span {
            display: block;
        }

        .invoice-table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .invoice-table tr td, .invoice-table tr th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .invoice-table tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<table style="width: 720px; border-collapse: collapse; margin: 50px auto 0px; padding: 0;">
    <tr>
        <td valign="top" style="width: 360px;">
            <img src="{{ getImageUrl(null) }}" alt="" height="40px;" width="40px;">
        </td>
        <td valign="top" style="width: 360px; float: right; text-align: right;">
            <span>Invoice Number : <strong>DA100001</strong></span>
            <span>Invoice Date : <strong>2053-06-21</strong></span>
            <span>Payment Status : <strong>Unpaid</strong></span>
        </td>
    </tr>
</table>
<table style="width: 720px; border-collapse: collapse; margin: 20px auto 0px; padding: 0;">
    <tr>
        <td valign="top" style="width: 360px;">
            <strong >From :</strong>
            <span>Daaruu Dot Com</span>
            <span>Address1</span>
            <span>Address2</span>
        </td>
        <td valign="top" style="width: 360px; float: right; text-align: right" >
            <strong>To : </strong>
            <span>Customer Name</span>
            <span>Address 1</span>
            <span>Address 2</span>
        </td>
    </tr>
</table>


<table class="invoice-table" style="width: 720px; border-collapse: collapse; margin: 20px auto 0px; padding: 0;">
    <tr>
        <th>Company</th>
        <th>Contact</th>
        <th>Country</th>
    </tr>
    <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
    </tr>
    <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
    </tr>
    <tr>
        <td>Ernst Handel</td>
        <td>Roland Mendel</td>
        <td>Austria</td>
    </tr>
    <tr>
        <td>Island Trading</td>
        <td>Helen Bennett</td>
        <td>UK</td>
    </tr>
    <tr>
        <td>Laughing Bacchus Winecellars</td>
        <td>Yoshi Tannamuri</td>
        <td>Canada</td>
    </tr>
    <tr>
        <td>Magazzini Alimentari Riuniti</td>
        <td>Giovanni Rovelli</td>
        <td>Italy</td>
    </tr>
</table>

</body>
</html>
