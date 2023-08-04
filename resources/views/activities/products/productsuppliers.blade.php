<select class="js-example-basic-single form-select form-control" id="product_supplier_{{ $id }}" name="product_name">
    <option value="" selected disabled>Select Supplier</option>
    @foreach ($supplierData as $key => $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
@error('product_name')
    <span class="text-danger">{{ $message }}</span>
@enderror
<script>
    initialize()
</script>