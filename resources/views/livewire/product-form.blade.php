<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>


        @if ($isOpen)
            <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl mb-4">{{ $product_id ? 'Edit' : 'Create' }} Producto</h2>
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                            <textarea id="description" wire:model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                            @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="number" id="price" wire:model="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('price') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
                            <input type="file" id="image" wire:model="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('image') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                            <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container mx-auto px-4 py-6">

                        <div class="flex justify-between mb-4">
                            <button wire:click="create" class="bg-green-500 text-white px-4 py-2 rounded">Crear Producto</button>
                        </div>

                        @if (session()->has('message'))
                            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-200 border">ID</th>
                                    <th class="py-2 px-4 bg-gray-200 border">Nombre</th>
                                    <th class="py-2 px-4 bg-gray-200 border">Descripcion</th>
                                    <th class="py-2 px-4 bg-gray-200 border">Precio</th>
                                    <th class="py-2 px-4 bg-gray-200 border">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="py-2 px-4 border text-center">{{ $product->id }}</td>
                                        <td class="py-2 px-4 border text-center">{{ $product->name }}</td>
                                        <td class="py-2 px-4 border text-center">{{ $product->description }}</td>
                                        <td class="py-2 px-4 border text-center">${{ $product->price }}</td>
                                        <td class="py-2 px-4 border text-center">
                                            <button wire:click="edit({{ $product->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded">Modificar</button>
                                            <button wire:click="delete({{ $product->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
