<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserConrollers extends Controller

{
    //
    public function tampilil()
    {
        return view("welcome");
    }

    public function show(string $id){
        $data = User::FindOrFail($id);
        return view('profil',['dataku'=>$data, 'data2'=>10]);
    }
}
