<tr>
    <td>{{ $id }}</td>
    <td>
        <div class="d-flex flex-column">
            <div>
                <select class="form-select form-control prodname" data-width="100%" id="prod{{ $id }}" name="product_name[]" onchange="getbprice(this);">
                    <option value="" selected disabled>Select Product</option>
                    @foreach ($productData as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->product_key }} - {{ $item->product_name }}</option>
                    @endforeach
                </select>
            </div>
            <span hidden class="text-danger" id="prod_err{{ $id }}"></span>
            @error('product_name')
                <span id="prod_err" class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    <td><input type="text" class="form-control" id="price{{ $id }}" name="bprice[]" onkeyup="changePrice(this)" readonly><span hidden class="text-danger" id="price_err{{ $id }}"></span></td>
    <td><input type="text" class="form-control" id="sprice{{ $id }}" name="sprice[]" onkeyup="changeSprice(this)" readonly><span hidden class="text-danger" id="sprice_err{{ $id }}"></span></td>
    <td><input type="text" class="form-control" id="stock{{ $id }}" name="stock[]" disabled></td>
    <td><input type="number" class="form-control" id="markup{{ $id }}" name="markup[]" disabled onkeyup="markupTotal(this)"><span hidden class="text-danger" id="markup_err{{ $id }}"></span></td>
    <td class="d-flex flex-column"><input type="number" class="form-control" id="quantity{{ $id }}" name="quantity[]" disabled onkeyup="getTotal(this)"><span hidden class="text-danger" id="qty_err{{ $id }}"></span></td>
    <td><input type="text" class="form-control" id="total{{ $id }}" name="total[]" disabled value="0"></td>
    <td hidden><input type="text" class="form-control" id="btotal{{ $id }}" name="btotal[]" value="0" disabled></td>
</tr>
<script>
    initialize();
</script>