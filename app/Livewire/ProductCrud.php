<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductCrud extends Component
{
    public $products;
    public $name, $price, $stock_quantity, $productId;
    public $updateMode = false;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product-crud');
    }

    // Reset input fields
    private function resetInputFields(){
        $this->name = '';
        $this->price = '';
        $this->stock_quantity = '';
        $this->productId = null;
        $this->updateMode = false;
    }

    // Create
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);

        Product::create($validatedData);

        session()->flash('message', 'Product Created Successfully.');

        $this->resetInputFields();
    }

    // Edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->stock_quantity = $product->stock_quantity;

        $this->updateMode = true;
    }

    // Update
    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);

        if ($this->productId) {
            // IDE-friendly update
            Product::where('id', $this->productId)->update($validatedData);

            session()->flash('message', 'Product Updated Successfully.');
            $this->resetInputFields();
        }
    }

    // Delete
    public function delete($id)
    {
        if($id){
            // IDE-friendly delete
            Product::destroy($id);

            session()->flash('message', 'Product Deleted Successfully.');
        }
    }
}
