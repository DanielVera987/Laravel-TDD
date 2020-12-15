<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(String $name, String $nickname = null) {
        if ($nickname) {
            return "Hola {$name}, tu apodo es {$nickname}";
        }

        return "Hola {$name}";
    }
}
