<?php

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;


new #[Layout('layouts.app')] class extends Livewire\Component {
    use WithPagination;

    public string $search = '';

    public function delete(int $id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'Product berhasil dihapus');
    }

    #[Computed]
    public function products()
    {
        return Product::where('name', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(10);
    }
};
