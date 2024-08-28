<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Usuarios') }}
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
                                <th class="py-2 px-4 bg-gray-200 border">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="py-2 px-4 border text-center">{{ $user->id }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $user->name }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $user->email }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $user->rol }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
