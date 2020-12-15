<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = [
            "daniel",
            "jose",
            "vera"
        ];

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
