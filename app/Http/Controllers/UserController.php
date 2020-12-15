<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return "Welcome User";
    }

    public function show($id) {
        return "El id del usuario es {$id}";
    } 

    public function create() {
        return "Usario nuevo";
    }
}
