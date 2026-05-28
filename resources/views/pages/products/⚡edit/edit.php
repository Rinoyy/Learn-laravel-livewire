<?php

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

new #[Layout('layouts.app')] class extends Livewire\Component {

    public int $productId;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('nullable|max:1000')]
    public string $description = '';

    #[Validate('required|numeric|min:0')]
    public string $price = '';

    #[Validate('required|integer|min:0')]
    public string $stock = '';

    public function mount(Product $product)
    {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description ?? '';
        $this->price = $product->price;
        $this->stock = $product->stock;
    }

    public function save()
    {
        $validated = $this->validate();
        Product::findOrFail($this->productId)->update($validated);
        session()->flash('success', 'Product berhasil diupdate');
        $this->redirect(route('products.index'), navigate: true);
    }
};
