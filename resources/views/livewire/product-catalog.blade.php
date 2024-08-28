<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catálogo de Productos') }}
        </h2>
    </x-slot>

    <div>
        <div class="container mx-auto px-4 py-6">
            @if (session()->has('message'))
                <div class="p-4 bg-blue-100 text-blue-800 rounded">
                    {{ session('message') }}
                </div>
            @endif

            @if(session()->has('success'))
                <div class="p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif


            @if(session()->has('error'))
                <div class="p-4 bg-red-100 text-red-800 rounded">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="container mx-auto px-4 py-6">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-md">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-32 object-cover mb-4 rounded">
                        <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-600">{{ $product->description }}</p>
                        <p class="text-gray-800 font-bold">${{ $product->price }}</p>
                        <button wire:click="initiatePayment({{ $product->id }})" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Comprar</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
