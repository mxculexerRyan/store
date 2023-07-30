<x-pagetop/>
    <div class="page-content">

        <div class="flex-wrap d-flex justify-content-between align-items-center grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Purchasesboard</h4>
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
            <form class="forms-sample" method="POST" action="{{ route('buy.add') }}">
                @csrf

                <div class="table-responsive">
                    <table id="purchasesTable" class="table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Seller</th>
                            <th>Buying Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <select class="form-select" id="prod1" name="product_name[]" onchange="getseller(this);">
                                        <option value="" selected disabled>Select Product</option>
                                        @foreach ($productData as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->product_key }} - {{ $item->product_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td id="supplier1"><input type="text" class="form-control" disabled></td>
                                <td><input type="text" class="form-control" id="price1" name="name"></td>
                                <td><input type="text" class="form-control" id="quantity1" name="name" disabled onkeyup="getTotal(this)"></td>
                                <td><input type="text" class="form-control" id="total1" name="name" value="0" disabled></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th><input type="text" class="form-control" id="sum" name="sum" disabled></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="button" id="addRowBtn" class="mb-2 btn btn-primary btn-icon-text mb-md-0">
                        <i class="btn-icon-prepend" data-feather="folder-plus"></i>
                        Add Purchases
                        </button>
                </div>
            </form>
        </div>

    </div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/trade/buy.js') }}"></script>
</body>
</html> 