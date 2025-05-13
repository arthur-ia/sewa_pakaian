<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Keranjangs;
use Illuminate\Http\Request;

class ShoppingcartController extends Controller
{
    public function index()
    {
        $cart = DB::table('keranjangs')->where('id_pelanggan', 1);
        return view('shoppingcart.index', [
            'title' => 'Shoppingcart',
            'datas' => $cart
        ]);
    }

    public function store(Request $request)
    {   
        $cari_pakaian = DB::table('keranjangs')->where('id_pakaian', $request->id_pakaian)->value('id_pakaian');
        if($cari_pakaian){
            $subtot = DB::table('vwkeranjang')->where('id_pelanggan', $request->id_pelanggan)->sum('subtotal');
            $pelanggan = DB::table('pelanggans')->where('id', '=', $request->id_pelanggan)->get()[0];
        $cart = DB::table('vwkeranjang')->where('id_pelanggan', $request->id_pelanggan)->get();
        return view('shoppingcart.index', [
            'title' => 'Shoppingcart',
            'datas' => $cart,
            'subtot' => $subtot,
            'pelanggan' => $pelanggan
        ]);
    }else{
        $data = $request->only([
            'id_pelanggan', 'id_pakaian', 'jumlah_order', 'subtotal'
        ]);

        Keranjangs::create($data);
        $cart = DB::table('vwkeranjang')->where('id_pelanggan', $request->id_pelanggan)->get();
        $subtot = DB::table('vwkeranjang')->where('id_pelanggan',  $request->id_pelanggan)->sum('subtotal');
        $pelanggan = DB::table('pelanggans')->where('id', '=', $request->id_pelanggan)->get()[0];
        return view('shoppingcart.index', [
            'title' => 'Shopping Cart',
            'datas' => $cart,
            'subtot' => $subtot,
            'pelanggan' => $pelanggan
        ]);
    }
}

    public function show(string $id)
    {
        $cart = DB::table('vwkeranjang')->where('id_pelanggan', '=', $id)->get();
        $subtot = DB::table('vwkeranjang')->where('id_pelanggan', '=', $id)->sum('subtotal');
        $pelanggan = DB::table('pelanggans')->where('id', '=', $id)->get()[0];
        return view('shoppingcart.index', [
            'title' => 'Shoppingcart',
            'datas' => $cart,
            'subtot' => $subtot,
            'pelanggan' => $pelanggan
        ]);
    }
}
