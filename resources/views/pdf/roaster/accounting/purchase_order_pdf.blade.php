<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }
        td, th{
            border: 1px solid #000000;
            text-align: left;
            padding: 1px;
        }
        #tag_name{
            text-align: center;
            font-size: 14px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        #header{
            background-color: #dddddd;
        }
        #form_type{
            
        }
    </style>
</head>
<body>
    <div>
        <h4 id="form_type">DELIVERY NOTE</h4>
    </div>
    <table id="dataTableExample" class="table table-bordered">
        <thead>
        <tr id="header">
            <th>No:</th>
            <th>Particulars</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
            @php
                $num = 0;
            @endphp
            @foreach ($orderData as $key => $item)
            <tr>
                <td>{{ $num+=1 }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->purchased_quantity }}</td>
                <td>{{ number_format($item->buying_price) }}</td>
                <td>{{ number_format($item->purchased_quantity * $item->buying_price) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>