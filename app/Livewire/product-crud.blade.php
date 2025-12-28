<div class="p-4">
    @if (session()->has('message'))
        <div class="bg-green-200 p-2 mb-4">{{ session('message') }}</div>
    @endif

    <div class="mb-4">
        <input type="text" placeholder="Name" wire:model="name" class="border p-2">
        <input type="number" placeholder="Price" wire:model="price" class="border p-2">
        <input type="number" placeholder="Stock" wire:model="stock_quantity" class="border p-2">
        @if($updateMode)
            <button wire:click="update" class="bg-blue-500 text-white px-2 py-1">Update</button>
        @else
            <button wire:click="store" class="bg-green-500 text-white px-2 py-1">Add Product</button>
        @endif
    </div>

    <table class="w-full border">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <button wire:click="edit({{ $product->id }})" class="bg-yellow-500 px-2 py-1 text-white">Edit</button>
                        <button wire:click="delete({{ $product->id }})" class="bg-red-500 px-2 py-1 text-white">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
