@php
$count = 0;
@endphp
@foreach ($transaksi as $item)
@if ($item && $item->status !== 'KOMPLIT')
@php
    $count++;
@endphp
@endif
@endforeach
@if ($count > 0)
<span class="ms-4 pt-1 top-0 start-100 translate-middle badge rounded-pill bg-danger">
    {{ $count }}
</span>
@endif
