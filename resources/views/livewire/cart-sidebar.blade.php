<div>
    <!-- Ikonica korpe -->
    <button wire:click="toggle" class="fixed top-4 right-4 bg-blue-600 text-white p-2 rounded-full shadow-lg z-50">
        🛒 ({{ $cartItems->sum('quantity') }})
    </button>

    <!-- Sidebar -->
    <div class="fixed top-0 h-full w-80 bg-white dark:bg-neutral-900 shadow-lg transition-all duration-300 z-40 p-4 overflow-y-auto"
         style="right: {{ $show ? '0' : '-22rem' }}">

        <h2 class="text-xl font-bold mb-4">Your Cart</h2>

        @if($cartItems->count())
            <ul>
                @foreach($cartItems as $item)
                    <li class="mb-3 border-b border-neutral-200 dark:border-neutral-700 pb-2 flex justify-between items-center">
                        <span>{{ $item->product->name }} (x{{ $item->quantity }}) {{ $item->product->price }}</span>
                        <button wire:click="removeItem({{ $item->id }})" class="text-red-500 font-bold px-2 py-1 rounded hover:bg-red-100">X</button>
                    </li>
                @endforeach
            </ul>

            <div class="mt-4 text-right font-semibold text-lg">
                Total: ${{ number_format($this->total, 2) }}
            </div>
        @else
            <p class="text-center text-gray-500">Your cart is empty.</p>
        @endif
    </div>
</div>
