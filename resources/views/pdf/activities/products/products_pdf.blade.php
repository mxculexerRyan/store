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
            font-size: 14px;
        }
        td, th{
            border: 1px solid #000000;
            text-align: left;
            /* padding: 0.5px; */
        }
        /* tr:nth-child(even){
            background-color: #dddddd;
        } */
        .text-center{
            text-align: center;
        }
        #tag_name{
            background-color: #dddddd;
            text-align: center;
            font-size: 14px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
    </style>
</head>
<body>
    <table id="dataTableExample" class="table table-bordered">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Jina La Bidhaa</th>
            <th>Buy Price</th>
            <th>Bei Ya Jumla</th>
            <th>Bei Ya Madukani</th>
            <th>Bei Ya Mteja</th>
        </tr>
        </thead>
        <tbody>
            @php
                $num = 0;
            @endphp
            @foreach ($tagData as $key => $item)
            <tr>
                <td colspan="6" id="tag_name">{{ $item->tag_name }}</td>
            </tr>
            @php
                $tag_id = $item->id;
                $prodData = DB::table('products')->join('selling_prices', 'products.id', '=', 'selling_prices.product_id' )
                ->join('buying_prices', 'products.id', '=', 'buying_prices.product_id' )
                ->where('tag_id', '=', $tag_id)
                ->orderBy('products.id', 'ASC')->get();
                // $prodData = App\Models\Product::where('tag_id', '=', $tag_id)->get();
            @endphp
            @foreach ($prodData as $newkey => $item)
            <tr>
                <td>{{ $num+=1 }}</td>
                <td>{{ $item->product_name }}</td>
                <td class="text-center"><b>{{ number_format($item->buying_price) }}</b> - 1pc</td>
                <td class="text-center"><b>{{ number_format($item->caton_price) }}</b> - {{ $item->caton_qty }}pc</td>
                <td class="text-center"><b>{{ number_format($item->shop_price) }}</b> - {{ $item->shop_qty }}pc</td>
                <td class="text-center"><b>{{ number_format($item->selling_price) }}</b> - 1pc</td>
                {{-- @php
                    if($item->product_quantity < 0){
                        $item->product_quantity = 0;
                    }
                @endphp
                <td>{{ $item->product_quantity }}</td> --}}
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>