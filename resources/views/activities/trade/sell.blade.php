<x-pagetop/>
    <div class="page-content">

        <div class="flex-wrap d-flex justify-content-between align-items-center grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Salesboard</h4>
            </div>
            <div class="flex-wrap d-flex align-items-center text-nowrap">
                <div class="mb-2 input-group flatpickr wd-200 me-2 mb-md-0" id="dashboardDate">
                <span class="bg-transparent input-group-text input-group-addon border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="bg-transparent form-control border-primary" placeholder="Select date" data-input>
                </div>
                <button type="button" id="addRowBtn" class="mb-2 btn btn-inverse-primary btn-icon-text mb-md-0">
                <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                Add Row
                </button>
            </div>
        </div>

        <div class="row">
            <form class="forms-sample" method="POST" action="{{ route('sell.add') }}">
                @csrf

                <div class="mb-3 d-flex flex-column">
                    <label for="to" class="form-label">Customer Name</label>
                    <select class="js-example-basic-single form-select form-control" id="to" name="to" onchange="customerlist();">
                        <option value="" selected disabled>Select Customer</option>
                        @foreach ($customerData as $key => $item)
                            <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    <span hidden class="text-danger" id="to_err"></span>
                    @error('to')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between col">
                    <div class="mb-3 d-flex flex-column col-4">
                        <label for="to" class="form-label">Payement Method</label>
                        <select class="js-example-basic-single form-select form-control" id="to1" name="to" onchange="customerlist();">
                            <option value="" selected disabled>Select Customer</option>
                            @foreach ($customerData as $key => $item)
                                <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span hidden class="text-danger" id="to_err"></span>
                        @error('to')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column col-4">
                        <label for="to" class="form-label">Customer Name</label>
                        <select class="js-example-basic-single form-select form-control" id="to2" name="to" onchange="customerlist();">
                            <option value="" selected disabled>Select Customer</option>
                            @foreach ($customerData as $key => $item)
                                <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span hidden class="text-danger" id="to_err"></span>
                        @error('to')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table id="salesTable" class="table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Buying Price</th>
                            <th>Selling Price</th>
                            <th>Stock Qty</th>
                            <th>Order Qty</th>
                            <th>Discount</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="flex-column d-flex">
                                            <select class="js-example-basic-single form-select form-control" data-width="100%" id="prod1" name="product_name[]" onchange="getsprice(this);">
                                                <option value="" selected disabled>Select Product</option>
                                                @foreach ($productData as $key => $item)
                                                    <option value="{{ $item->id }}">{{ $item->product_key }} - {{ $item->product_name }}</option>
                                                @endforeach
                                            </select>
                                            <span hidden class="text-danger" id="prod_err1"></span>
                                        </div>
                                        @error('product_name')
                                            <span id="prod_err1" class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td><input type="text" class="form-control" id="price1" name="bprice[]"></td>
                                <td><input type="text" class="form-control" id="sprice1" name="sprice[]"></td>
                                <td><input type="text" class="form-control" id="stock1" name="stock[]" disabled></td>
                                <td class="d-flex flex-column"><input type="number" class="form-control" id="quantity1" name="quantity[]" disabled onkeyup="getTotal(this)"><span hidden class="text-danger" id="qty_err1"></span></td>
                                <td><input type="number" class="form-control" id="discount1" name="discount[]"></td>
                                <td><input type="text" class="form-control" id="total1" name="name[]" value="0" disabled></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Items</th>
                                <th><input type="text" class="form-control"  id="items_quantity" name="items_quantity" readonly>
                                    @error('items_quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th>Paid Amout</th>
                                <th class="d-flex flex-column"><input type="text" class="form-control" id="paid_amount" name="paid_amount" onkeyup="paidchnage()">
                                    <span hidden class="text-danger" id="paid_err"></span>
                                    @error('paid_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </th>
                                <th>Total Amount</th>
                                <th><input type="text" class="form-control" id="order_value" name="order_value">
                                    @error('order_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" id="addSellBtn" class="mb-2 btn btn-primary btn-icon-text mb-md-0 hazzy">
                        <i class="btn-icon-prepend" data-feather="folder-plus"></i>
                        Add Sales
                        </button>
                </div>
            </form>
        </div>

    </div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script>
<script>

let initialize = function(){
    $(".prodname").select2();
}
</script>
</body>
</html> 