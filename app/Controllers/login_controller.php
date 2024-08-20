<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class login_controller extends Controller
{
    public function mostrarLoginForm()
    {
        return view('loginview');
    }
}