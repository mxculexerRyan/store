<option value="" selected disabled>Select Supplier</option>
@foreach ($supplierData as $key => $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach