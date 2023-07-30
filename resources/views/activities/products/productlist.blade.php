<tr>
    <td>{{ $id }}</td>
    <td>
        <select class="form-select" id="prod{{ $id }}" name="product_name[]" onchange="getseller(this);">
            <option value="" selected disabled>Select Product</option>
            @foreach ($productData as $key => $item)
                <option value="{{ $item->id }}">{{ $item->product_key }} - {{ $item->product_name }}</option>
            @endforeach
        </select>
        @error('product_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </td>
    <td id="supplier{{ $id }}"><input type="text" class="form-control" disabled></td>
    <td><input type="text" class="form-control" id="price{{ $id }}" name="name"></td>
    <td><input type="text" class="form-control" id="quantity{{ $id }}" name="name" disabled onkeyup="getTotal(this)"></td>
    <td><input type="text" class="form-control" id="total{{ $id }}" name="name" disabled value="0"></td>
</tr>