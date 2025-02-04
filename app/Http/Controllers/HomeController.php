<?php

namespace App\Http\Controllers;

use App\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'title' => 'Home'
        ]);
    }


}
