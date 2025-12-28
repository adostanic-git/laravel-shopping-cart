<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full max-w-6xl mx-auto">
    @foreach($products as $product)
        <div class="border rounded-xl p-4 flex flex-col justify-between bg-white dark:bg-neutral-900 shadow-md">
            <h2 class="font-semibold text-lg mb-2 text-center">{{ $product->name }}</h2>
            <p class="text-sm mb-2 text-center">Price: ${{ $product->price }}</p>
            <p class="text-sm mb-4 text-center">Stock: {{ $product->stock_quantity }}</p>
            
            <button wire:click="addToCart({{ $product->id }})"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md transition-colors">
                Add to Cart
            </button>
        </div>
    @endforeach

    @if(session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
             class="fixed top-4 right-4 bg-green-700 text-white px-4 py-2 rounded shadow-lg z-50">
            {{ session('message') }}
        </div>
    @endif
</div>
