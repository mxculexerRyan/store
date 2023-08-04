<tr>
    <td>{{ $id }}</td>
    <td>
        <select class="js-example-basic-single form-select form-control" name="product_name[]" id="prod{{ $id }}" onchange="getseller(this)" required> 
            <option value="" selected disabled>Select Product</option>
            @foreach ($productData as $key => $item)
                <option value="{{ $item->id }}">{{ $item->product_key }} - {{ $item->product_name }}</option>
            @endforeach
        @error('product_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </td>
    <td>
        <select class="js-example-basic-single form-select form-control" id="product_supplier_{{ $id }}" name="product_name">
        <option value="" selected disabled>Select Supplier</option>
        @foreach ($supplierData as $key => $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('product_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </td>
    <td><input type="text" class="form-control" id="price{{ $id }}" name="name"></td>
    <td><input type="number" class="form-control" id="quantity{{ $id }}" name="name" disabled onkeyup="getTotal(this)" required></td>
    <td><input type="text" class="form-control" id="total{{ $id }}" name="name" disabled value="0"></td>
</tr>
<script>
    initialize()
</script>