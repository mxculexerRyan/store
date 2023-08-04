<tr>
    <td>{{ $id }}</td>
    <td>
        <div class="d-flex flex-column">
            <div>
                <select class="js-example-basic-single form-select form-control prodname" data-width="100%" id="prod{{ $id }}" name="product_name[]" onchange="getsprice(this);">
                    <option value="" selected disabled>Select Product</option>
                    @foreach ($productData as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->product_key }} - {{ $item->product_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('product_name')
                <span id="prod_err" class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </td>
    <td><input type="text" class="form-control" id="price{{ $id }}" name="name"></td>
    <td><input type="text" class="form-control" id="sprice{{ $id }}" name="name"></td>
    <td><input type="number" class="form-control" id="quantity{{ $id }}" name="name" disabled onkeyup="getTotal(this)"></td>
    <td><input type="text" class="form-control" id="total{{ $id }}" name="name" disabled value="0"></td>
</tr>
<script>
    initialize()
</script>