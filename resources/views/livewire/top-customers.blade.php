<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes Top') }}
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
                                <th class="py-2 px-4 bg-gray-200 border">Nombre</th>
                                <th class="py-2 px-4 bg-gray-200 border">Email</th>
                                <th class="py-2 px-4 bg-gray-200 border">Numero de Compras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topCustomers as $index => $customer)
                                <tr>
                                    <td class="py-2 px-4 border text-center">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $customer->name }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $customer->email }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $customer->purchases_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
