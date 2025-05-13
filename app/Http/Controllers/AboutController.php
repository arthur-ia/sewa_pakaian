<?php

namespace App\Http\Controllers;

use App\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.index', [
            'title' => 'About'
        ]);
    }


}  
