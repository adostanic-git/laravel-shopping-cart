<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartSidebar extends Component
{
    public $show = false;
    public $cartItems = [];

    protected $listeners = ['refreshCart' => 'loadCartItems'];

    public function mount()
    {
        $this->loadCartItems();
    }

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function loadCartItems()
    {
        $user = Auth::user();
        if ($user && $user->cart) {
            $this->cartItems = $user->cart->items()->with('product')->get();
        } else {
            $this->cartItems = collect();
        }
    }

    public function removeItem($itemId)
    {
        $user = Auth::user();
        if ($user && $user->cart) {
            $item = $user->cart->items()->find($itemId);
            if ($item) {
                $item->delete();
            }
        }
        $this->loadCartItems();
        session()->flash('message', 'Item removed from cart.');
    }

    public function getTotalProperty()
    {
        return $this->cartItems->sum(function($item) {
            return $item->quantity * $item->product->price;
        });
    }

    public function render()
    {
        return view('livewire.cart-sidebar');
    }
}
