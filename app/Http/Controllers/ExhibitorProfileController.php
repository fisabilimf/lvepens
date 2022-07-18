<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exhibitor;
use App\User;
use Illuminate\Support\Facades\Hash;

class ExhibitorProfileController extends Controller
{
    public function store()
    {
        $user = User::create([
            'email' => request('email'),
            'privilege' => request('privilege'),
            'password' => Hash::make(request('password')),
        ]);
        Exhibitor::create([
            'user_id' => $user->id,
            'ename' => request('ename'),
            'slug' => str_slug(request('ename')),

        ]);
        return redirect()->to('login')->with('message', 'Mohon login menggunakan akun Anda');
    }
}
