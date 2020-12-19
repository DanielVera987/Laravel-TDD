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

    public function show(User $user) {
        return view('users_show', [
            'user' => $user
        ]);
    } 

    public function create() {
        return view('users_create');
    }

    public function store() {
        return 'Hola';
    }
}
