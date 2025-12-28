<div class="p-4">
    <!-- Poruka za uspeh -->
    @if (session()->has('message'))
        <div class="bg-green-700 text-white p-2 mb-4 text-center rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form za unos proizvoda -->
    <div class="mb-4 flex flex-col sm:flex-row gap-2">
        <input type="text" placeholder="Name" wire:model="name" class="border p-2 rounded w-full sm:w-auto">
        <input type="number" placeholder="Price" wire:model="price" class="border p-2 rounded w-full sm:w-auto">
        <input type="number" placeholder="Stock" wire:model="stock_quantity" class="border p-2 rounded w-full sm:w-auto">
        @if($updateMode)
            <button wire:click="update" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        @else
            <button wire:click="store" class="bg-green-500 text-white px-4 py-2 rounded">Add Product</button>
        @endif
    </div>

    <!-- Tabela proizvoda -->
    <table class="w-full border-collapse border border-neutral-300 text-center">
        <thead class="bg-neutral-100 dark:bg-neutral-700">
            <tr>
                <th class="border border-neutral-300 p-2">Name</th>
                <th class="border border-neutral-300 p-2">Price</th>
                <th class="border border-neutral-300 p-2">Stock</th>
                <th class="border border-neutral-300 p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="bg-white dark:bg-neutral-900">
                    <td class="border border-neutral-300 p-2">{{ $product->name }}</td>
                    <td class="border border-neutral-300 p-2">${{ $product->price }}</td>
                    <td class="border border-neutral-300 p-2">{{ $product->stock_quantity }}</td>
                    <td class="border border-neutral-300 p-2 flex justify-center gap-2">
                        <button wire:click="edit({{ $product->id }})" class="bg-yellow-500 px-2 py-1 text-white rounded">Edit</button>
                        <button wire:click="delete({{ $product->id }})" class="bg-red-500 px-2 py-1 text-white rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
