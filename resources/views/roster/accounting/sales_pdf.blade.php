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
            padding: 8px;
        }
        tr:nth-child(even){
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <table id="dataTableExample" class="table table-bordered">
        <thead>
        <tr>
            <th>Order No</th>
            <th>Item Name</th>
            <th>S-Price</th>
            <th>Sold Quantity</th>
            <th>Sales Cost</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($salesData as $key => $item)
                <tr>
                    <td>{{ $item->order_id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->selling_price }}</td>
                    <td>{{ $item->sold_quantity }}</td>
                    <td>{{ $item->vat_fees + $item->item_discount }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>