<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index', [
            'title' => 'Admin',
            'menu' => 'Orders',
           
        ]);
    }
}
