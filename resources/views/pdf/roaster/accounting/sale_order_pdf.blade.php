<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        .prodlist{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }
        .lined{
            border: 1px solid #000000;
            text-align: left;
            padding: 1px;
        }
        .lined-nr{
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
            border-left: 1px solid #000000;
            
        }
        .lined-nl{
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
            border-right: 1px solid #000000;
            
        }
        .lined-tb{
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
            
        }
        /* tr:nth-child(even){
            background-color: #dddddd;
        } */
        #tag_name{
            text-align: center;
            font-size: 14px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        .bg-grey{
            background-color: #dddddd;
        }
        #form_title{
            text-align: right;
            font-family: sans-serif;
            font-size: 24px;
        }
        #comp_name{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: bold;
            font-size: 24px;
        }
        p{
            font-family: Arial, Helvetica, sans-serif;
        }
        .details{
            margin: 0;
            padding: 0;
        }
        .right-text{
            text-align: right;
        }
        .bold{
            font-weight: bold
        }
        .size_3{
            width: 32%
        }
        .size_4{
            width: 42%
        }
        .font-16{
            font-size: 16px;
        }
        .font-14{
            font-size: 14px;
        }
        .font-12{
            font-size: 12px;
        }
        .borderd{
            border: 1px solid black;
        }
        /* .row>div{
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
        } */
    </style>
</head>
<body>
    <div id="form_title">
        <h3>DELIVERY NOTE</h3>
    </div>
    @foreach ($oderDet as $key => $item)
            @php
                $value      =$item->order_value;
                $created_at     =$item->created_at;
                $due_date  =$item->due_date;
                $id  =$item->id;
            @endphp
        @endforeach
    
    <table class="prodlist">
        <tr>
            <td colspan="2000"><p id="comp_name" class="details">Kanza Electronics</p></td>
        </tr>
        <tr>
            <td colspan="1560"><p class="details">Rwagasore ST, Mwanza</p></td>
            <td colspan="300" class="right-text"><p class="details">INVOICE NO: A00BS#0{{ $id }}</p></td>
        </tr>
        <tr>
            <td colspan="10"><a href="http://kanzatrader2010@gmail.com">kanzatraders2010@gmail.com</a></td>
        </tr>
        <tr>
            <td colspan="1" rowspan="2">Phone:</td>
            <td colspan="1399">0628665722</td>
            <td colspan="300" class="lined bg-grey bold">Sales Date</td>
            <td colspan="350" class="lined bg-grey bold">Due Date</td>
        </tr>
        
        <tr>
            <td colspan="1399">0627776169</td>
            <td colspan="300" class="lined">{{ $created_at }}</td>
            <td colspan="350" class="lined bot-line">{{ $due_date }}</td>
        </tr>
    </table>
    <br>
    
    <table class="prodlist">
        <tr>
            <td class="size_3">
                <table class="prodlist">
                        @foreach ($userDet as $key => $item)
                            @php
                                $cname      =$item->name;
                                $cphone     =$item->phone;
                                $clocation  =$item->location;
                            @endphp
                        @endforeach
                        <tr>
                            <td class="lined bg-grey font-16">BILL TO</td>
                        </tr>
                        <tr>
                            <td>{{ $cname }}</td>
                        </tr>
                        <tr>
                            <td>{{ $clocation }}</td>
                        </tr>
                        <tr>
                            <td>{{ $cphone }}</td>
                        </tr>
                </table>
            </td>
            <td class="size_3"></td>
            <td class="size_3">
                <table class="prodlist">
                    <tr>
                        <td colspan="2" class="lined bg-grey font-16">PAYMENT</td>
                    </tr>
                    @foreach ($accounts as $key => $item)
                        <tr>
                            <td class="lined-nr"> {{ $item->account_type }}</td>
                            <td class="bold font-14 lined-nl">{{ $item->account_number }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="bold font-12">{{ $item->account_name }}</td>
                        </tr>
                        @endforeach
                </table>
            </td>
        </tr>
    </table>

    <br>
    
    <table class="table table-bordered prodlist">
        <thead>
        <tr class="bg-grey">
            <th class="lined">No:</th>
            <th colspan="3" class="lined">Particulars</th>
            {{-- <th class="lined">Unit Price</th> --}}
            <th class="lined">Qty</th>
            {{-- <th class="lined">Amount</th> --}}
        </tr>
        </thead>
        <tbody>
            @php
                $num = 0;
            @endphp
            @foreach ($orderData as $key => $item)
            <tr>
                <td class="lined">{{ $num+=1 }}</td>
                <td colspan="3" class="lined">{{ $item->product_name }}</td>
                {{-- <td class="lined">{{ number_format($item->selling_price - $item->item_discount) }}</td> --}}
                <td class="lined">{{ number_format($item->sold_quantity) }}</td>
                {{-- <td class="lined">{{ number_format($item->sold_quantity * ($item->selling_price - $item->item_discount)) }}</td> --}}
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <td colspan="3" class="lined-nr">Thank You For Trusting In Us....</td>
            <td class="lined-nr bold font-14">SUM:</td>
            <td class="lined-nl bold font-14">1,121,300</td>
        </tfoot>
    </table>
</body>
</html>