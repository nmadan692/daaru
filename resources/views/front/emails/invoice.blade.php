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
{{--</head>--}}
<body>
<table style="width: 720px; border-collapse: collapse; margin: 50px auto 0px; padding: 0;">
    <tr>
        <td valign="top" style="width: 360px;">
            <img src="{{ getImageUrl($setting[0]->logo ) }}" alt="" height="100px;" width="200px;">
        </td>
        <td valign="top" style="width: 360px; float: right; text-align: right;">
            <span>Invoice Number : <strong>{{ $order->invoice_number }}</strong></span>
            <span>Invoice Date : <strong>{{ $order->created_at }}</strong></span>
            <span>Payment Status : <strong>{{ $order->pay_status }}</strong></span>
        </td>
    </tr>
</table>
<table style="width: 720px; border-collapse: collapse; margin: 20px auto 0px; padding: 0;">
    <tr>
        <td valign="top" style="width: 360px;">
            <strong >From :</strong>
            <span>{{ $setting[0]->name }}</span>
            <span>{{ $setting[0]->address }}</span>
            <span>{{ $setting[0]->email }}</span>
            <span>{{ $setting[0]->phone }}</span>
        </td>
        <td valign="top" style="width: 360px; float: right; text-align: right" >
            <strong>To : </strong>
            <span>{{ $user->full_name }}</span>
            <span>{{ $user->address1.($user->address2) ? (', '. $user->address2) : null}}</span>
            <span>{{ $user->email }}</span>
            <span>{{ $user->phone }}</span>
        </td>
    </tr>
</table>


<table class="invoice-table" style="width: 720px; border-collapse: collapse; margin: 20px auto 0px; padding: 0;">
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </tr>
    @php
        $subTotal= 0;
    @endphp
    @foreach($order->products as $product)
        @php
            $subTotal+= $product->pivot->amount;
        @endphp
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->pivot->quantity }}</td>
            <td>{{ 'Nrs '.$product->discount_amount }}</td>
            <td>{{ 'Nrs '.$product->pivot->amount }}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td>Total</td>
        <td>{{ 'Nrs '.$subTotal }}</td>
    </tr>
</table>

<table style="width: 720px; border-collapse: collapse; margin: 20px auto 0px; padding: 0;">
    <tr>
        <span style="text-align: center">Thank you for buying our products.</span>
    </tr>
</table>

</body>
{{--</html>--}}
