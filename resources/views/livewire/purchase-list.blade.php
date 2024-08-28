<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Compras Realizadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">

                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 border">ID</th>
                                <th class="py-2 px-4 bg-gray-200 border">Usuario</th>
                                <th class="py-2 px-4 bg-gray-200 border">Producto</th>
                                <th class="py-2 px-4 bg-gray-200 border">Monto</th>
                                <th class="py-2 px-4 bg-gray-200 border">Fecha de Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td class="py-2 px-4 border text-center">{{ $purchase->id }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $purchase->user->name }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $purchase->product->name }}</td>
                                    <td class="py-2 px-4 border text-center">${{ number_format($purchase->amount, 2) }}</td>
                                    <td class="py-2 px-4 border text-center">
                                        {{ $purchase->created_at ? $purchase->created_at->format('d/m/Y H:i') : 'N/A' }}
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
