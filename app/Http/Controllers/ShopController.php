<?php

namespace App\Http\Controllers;
use App\Models\Clothes;
use App\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index', [
            'title' => 'Shop',
            'data' => Clothes::all()
        ]);
    }


}
