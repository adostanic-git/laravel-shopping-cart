<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $cartItems;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = Auth::user()
            ->cart
            ->items()
            ->with('product')
            ->get();
    }

    // Update quantity
    public function updateQuantity($itemId, $quantity)
    {
        $cartItem = CartItem::find($itemId);

        if ($cartItem && $cartItem->cart->user_id == Auth::id()) {
            // IDE-friendly update
            CartItem::where('id', $cartItem->id)
                ->update(['quantity' => max(1, $quantity)]);

            $this->loadCart(); // refresh
        }
    }

    // Remove item
    public function removeItem($itemId)
    {
        $cartItem = CartItem::find($itemId);

        if ($cartItem && $cartItem->cart->user_id == Auth::id()) {
            // IDE-friendly delete
            CartItem::destroy($cartItem->id);

            $this->loadCart(); // refresh
        }
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
