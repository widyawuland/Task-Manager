<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

$adminRole = Role::findByName('admin');
$adminRole->givePermissionTo('view posts');
$adminRole->givePermissionTo('create posts');

$userRole = Role::findByName('user');
$userRole->givePermissionTo('view posts');
$user = User::find(2); // misal pengguna dengan ID 1
$user->assignRole('admin');

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarahkan ke view login
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencoba untuk login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, redirect ke halaman yang diinginkan
            return redirect()->intended('tasks'); // Ganti 'tasks' dengan route yang diinginkan
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
    
}
