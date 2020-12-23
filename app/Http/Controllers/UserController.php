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
        $data = request()->validate([
            'name' => 'required',
            'email' => ['email','required','unique:users,email'],
            'password' => 'required|between:6,14'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'password.required' => 'El campo password es obligatorio'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('users');
    }

    public function edit(User $user)
    {
        return view('users_edit', [
            "user" => $user
        ]);
    }

    public function update(User $user) 
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => ['email','required','unique:users,email'],
            'password' => 'required|between:6,14'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'password.required' => 'El campo password es obligatorio'
        ]);

        $data['password'] = bcrypt($data['password']);

        $user->update($data);

        return redirect("/usuarios/{$user->id}/editar");
    }
}
