<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        // Pastikan view ini sesuai dengan yang Anda gunakan
        return view('layouts.navigation');
    }
}
