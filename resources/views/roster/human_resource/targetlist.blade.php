<option value="" selected disabled>Assigned To</option>
@foreach ($assigList as $key => $item)
    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
@endforeach