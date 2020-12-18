<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }

    public function show($id) {
        return "El id del usuario es {$id}";
    } 

    public function create() {
        return "Usario nuevo";
    }
}
