<h1>Daily Sales Report</h1>

@if($sales->count())
    <ul>
    @foreach($sales as $item)
        <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Total: ${{ $item->quantity * $item->product->price }}</li>
    @endforeach
    </ul>

    <p>Total Sales: ${{ $sales->sum(fn($i) => $i->quantity * $i->product->price) }}</p>
@else
    <p>No sales today.</p>
@endif
