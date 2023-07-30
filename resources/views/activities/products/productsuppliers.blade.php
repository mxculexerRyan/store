<select class="form-select" id="product_supplier_{{ $id }}" name="product_name">
    <option value="" selected disabled>Select Supplier</option>
    @foreach ($supplierData as $key => $item)
        <option value="{{ $item->id }}">{{ $item->supplier_name }}</option>
    @endforeach
</select>
@error('product_name')
    <span class="text-danger">{{ $message }}</span>
@enderror
