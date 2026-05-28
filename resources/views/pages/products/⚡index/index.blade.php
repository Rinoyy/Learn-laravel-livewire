<div>
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="{{ route('products.create') }}" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            + Add Product
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded bg-green-100 p-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <input
        wire:model.live.debounce.300ms="search"
        type="text"
        placeholder="Search products..."
        class="mb-4 w-full rounded border px-3 py-2"
    />

    <table class="w-full border-collapse rounded border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Price</th>
                <th class="border px-4 py-2 text-left">Stock</th>
                <th class="border px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($this->products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:underline">Edit</a>
                        <button wire:click="delete({{ $product->id }})" wire:confirm="Yakin hapus?" class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center text-gray-500">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $this->products->links() }}
    </div>
</div>
