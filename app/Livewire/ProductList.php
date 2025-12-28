<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductList extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function addToCart($productId)
    {
        $user = Auth::user();
        if (!$user) {
            session()->flash('message', 'You must be logged in to add products to cart.');
            return;
        }

        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);

        $item = $cart->items()->where('product_id', $productId)->first();
        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        session()->flash('message', 'Product added to cart!');

        
        $this->dispatch('refreshCart');

    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
