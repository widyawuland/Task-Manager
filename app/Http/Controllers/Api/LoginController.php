<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\TaskResource;

class LoginController extends Controller
{
    public function Login(Request $request){
        //validasi request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //panggil model user
        $user = User::where("email", $request-> email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return new TaskResource(false, "Password salah", 401);
        }

        //variabel token untuk mengindentifikasi kita untuk login
        $token=$user->createToken("auth_token",$user->getAllPermissions()->pluck("name")->toArray())->plainTextToken;
        return new TaskResource(true, "Berhasil",[
            "token" => $token,
            //menampilkan hak akses pengguna yang sudah login
            "hak"=>$user->load("roles")
        ]);
    }

    public function LoginOut(Request $request){
        $request->user()->currentAccessToken()->delete();
        return new TaskResource(true, "Berhasil Logout",202);
    }
}
