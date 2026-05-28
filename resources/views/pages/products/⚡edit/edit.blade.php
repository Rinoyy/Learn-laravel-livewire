<div>
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Edit Product</h1>
        <a href="{{ route('products.index') }}" class="text-gray-600 hover:underline">← Back</a>
    </div>

    <form wire:submit="save" class="max-w-lg space-y-4">
        <div>
            <label class="mb-1 block font-medium">Name</label>
            <input wire:model="name" type="text" class="w-full rounded border px-3 py-2" />
            @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-1 block font-medium">Description</label>
            <textarea wire:model="description" rows="3" class="w-full rounded border px-3 py-2"></textarea>
            @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-1 block font-medium">Price</label>
            <input wire:model="price" type="number" step="0.01" class="w-full rounded border px-3 py-2" />
            @error('price') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-1 block font-medium">Stock</label>
            <input wire:model="stock" type="number" class="w-full rounded border px-3 py-2" />
            @error('stock') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="rounded bg-blue-600 px-6 py-2 text-white hover:bg-blue-700">
            Update
        </button>
    </form>
</div>
