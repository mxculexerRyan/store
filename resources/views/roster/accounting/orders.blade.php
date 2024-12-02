<x-pagetop/>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Table</li>
        </ol>
    </nav>

    <div class="py-2 my-2">
        @php $key = 0; @endphp
        <div class="accordion" id="order{{ $key+1 }}">
            @foreach ($orderData as $key => $item)
                <div class="my-2 accordion-item">
                    <h2 class="accordion-header" id="heading{{ $item->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key+1 }}" aria-expanded="false" aria-controls="collapse{{ $key+1 }}">
                        <div class="flex-row d-flex">
                            @if ($item->order_type == "order_in")
                                @php $toId = $item->to; $toData = App\Models\user::find($toId);@endphp
                                @php $fromId = $item->from; $fromData = App\Models\Hr\Shareholder::find($fromId);@endphp
                                @php $orderId = $item->id; $orderLoop   = App\Models\Accounting\Purchase::where('order_id', '=', $orderId)->where('status', '=', 'Available')->get(); 
                                    $direction = "purchase";
                                @endphp
                                <div class="align-items-baseline flex-column d-flex">
                                    <div>
                                        Order Id: #{{ $item->id }}
                                    </div>
                                    <div>
                                        Sold to: {{ $toData->name }}
                                    </div>
                                </div>
                                <div class="mx-6 align-items-baseline flex-column d-flex">
                                    <div class="mx-6">
                                        Order Date: {{ $item->created_at }}
                                    </div>
                                    <div class="mx-6">
                                        Sold By: {{ $fromData->name }}
                                    </div>
                                </div>
                                <div class="align-items-baseline flex-column d-flex">
                                    <div>
                                        Order Value: {{ number_format($item->order_value) }}
                                    </div>
                                </div>
                                @else
                                @php $fromId = $item->from; $fromData = App\Models\user::find($fromId);@endphp
                                @php $toId = $item->to; $toData = App\Models\Hr\Shareholder::find($toId);@endphp
                                @php $orderId = $item->id; $orderLoop   = App\Models\Accounting\Sale::where('order_id', '=', $orderId)->where('status', '=', 'Available')->get(); 
                                    $direction = "sale";
                                @endphp
                                <div class="align-items-baseline flex-column d-flex">
                                    <div>
                                        Order Id: #{{ $item->id }}
                                    </div>
                                    <div>
                                        Sold By: {{ $fromData->name }}
                                    </div>
                                </div>
                                <div class="mx-6 flex-column d-flex align-items-baseline">
                                    <div class="mx-6">
                                        Order Date: {{ $item->created_at }}
                                    </div>
                                    <div class="mx-6">
                                        Sold to: {{ $toData->name }}
                                    </div>
                                </div>
                                <div class="align-items-baseline flex-column d-flex">
                                    <div>
                                        Order Value: {{ number_format($item->order_value) }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </button>
                    </h2>
                    <div id="collapse{{ $key+1 }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key+1 }}" data-bs-parent="#order{{ $key+1 }}">
                        <div class="accordion-body">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                @php
                                $link = '';
                                    if($item->order_type == "order_out"){
                                        $link = 'getSalesOrderPdf';
                                    }else{
                                        $link = 'getPurchasesOrderPdf';
                                    }
                                @endphp
                                    {{-- <a href="{{ URL::route($link) }}" class="mb-2 btn btn-primary btn-icon-text mb-md-0"> --}}
                                    
                                    <a href="/deleteOrder?id={{ $item->id }}" class="mb-2 btn btn-danger btn-icon-text mb-md-0">
                                        <i class="btn-icon-prepend" data-feather="trash-2"></i>Delete
                                    </a>
                                    <a href="/{{ $link }}?id={{ $item->id }}" class="mb-2 btn btn-primary btn-icon-text mb-md-0">
                                        <i class="btn-icon-prepend" data-feather="download-cloud"></i>Download
                                    </a>
                                    
                                </div>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Particulars</th>
                                        <th>Qty</th>
                                        <th>Buy Price</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Profit</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orderLoop as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        @php $prodId = $item->item_name; $prodData = App\Models\Product::find($prodId);@endphp
                                        <td>{{ $prodData->product_name }}</td>
                                        @if($direction == "purchase")
                                        @php $dir = 'p'; @endphp
                                        <td>{{ $item->purchased_quantity }}</td>
                                        <td>{{ number_format($item->buying_price - $item->item_discount) }}</td>
                                        <td>{{ number_format($item->buying_price) }}</td>
                                        <td>{{ number_format(($item->buying_price *  $item->purchased_quantity))}}</td>
                                        <td>-</td>
                                        @else
                                        @php $dir = 's'; @endphp
                                        <td>{{ $item->sold_quantity }}</td>
                                        <td>{{ number_format($item->buying_price) }}</td>
                                        <td>{{ number_format($item->selling_price - $item->item_discount) }}</td>
                                        <td>{{ number_format(($item->selling_price *  $item->sold_quantity) - ($item->sold_quantity * $item->item_discount))}}</td>
                                        <td>{{ number_format((($item->selling_price - $item->item_discount) - ($item->buying_price)) *  $item->sold_quantity)}}</td>
                                        @endif
                                        <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#addAccountsModal"><i data-feather="edit"></i></button></td>
                                        <td><button type="button" id="{{ $dir }}-{{ $item->id }}" class="btn btn-inverse-danger btn-icon dltBtn" ><i data-feather="trash-2"></i></button></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-accounting.ordersmodal/>
</div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/accounting/orders.js') }}"></script>
</body>
</html> 