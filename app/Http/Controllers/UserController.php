<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
{
    $users = User::all();
    return view('users.index', compact('users'));
}

    public function fetchUsers()
    {
        $response = Http::get('https://reqres.in/api/users');
        $users = $response->json()['data'];

        foreach ($users as $userData) {

            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['first_name'] . ' ' . $userData['last_name'],
                    'email' => $userData['email'],
                    'password' => Hash::make('password123'),
                ]
            );

            $user->assignRole('Administrador');
        }

        return redirect()->route('users.index')->with('success', 'Usuarios creados correctamente.');
    }
}
