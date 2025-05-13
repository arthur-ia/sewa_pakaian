<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentmethodController extends Controller
{
    public function index()
    {
        return view('paymentmethod.index', [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'datas' => PaymentMethod::all()
        ]);
    }
    public function create()
    {
        return view('paymentmethod.create', [
            'title' => 'Admin',
            'menu'=> 'Payment Method'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $paymentmethod = DB::table('jenis_pembayarans')
         ->where('metode_pembayaran', '=' , $request->metode_pembayaran)
         ->value('metode_pembayaran');
         if($paymentmethod){
         return view('paymentmethod.create', [
            'title' => 'Admin',
            'nama' => Auth::user()->name,
            'level' => Auth::user()->level,
            'menu' => 'Payment Method',
            'status' => 'duplikat',
            'pesan' => 'Payment Method '
            . $request->metode_pembayaran .
            ' Data is already in the Database',
            'metode_pembayaran' => $request->metode_pembayaran  

         ]);
        }else{
        $data = $request->only([
            'metode_pembayaran'
        ]);
        $simpan = PaymentMethod::create($data);
        if($simpan){
            return view('paymentmethod.index',[
                'title' => 'Admin',
                'menu' => 'Payment Method',
                'datas' => PaymentMethod::all(),
                'status' => 'simpan',
                'pesan' => 'Payment Method '
                . $request->metode_pembayaran .
                ' Data has been succesfully saved'
            ]);
        }
        }
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $paymentmethod = PaymentMethod::find($id);
        return view('paymentmethod.edit' , [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'data' => $paymentmethod,
        ]);
    }
    
    public function update(Request $request, string $id)
    {   
        $paymentmethod = DB ::table('jenis_pembayarans')
        ->where('metode_pembayaran', '=', $request->metode_pembayaran)
        ->value('metode_pembayaran');

        if($paymentmethod){
            return view('paymentmethod.edit', [
               'title' => 'Admin',
               'menu' => 'Payment Method',
               'status' => 'duplikat',
               'pesan' => 'Payment Method '
               . $request->metode_pembayaran .
               ' Data is already in the Database',
               'metode_pembayaran' => $request->metode_pembayaran, 
               'data_lama' =>$request->metode_pembayaran
            ]);
        }else{

        $data = PaymentMethod::find($id);
        $data->metode_pembayaran = $request ->metode_pembayaran;
        $data->save();
        return view('paymentmethod.index' , [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'datas' => PaymentMethod::all(),
            'status' => 'edit',
            'pesan' => 'Payment Method '
            . $request->metode_pembayaran .
            ' Data has been succesfully Edited'
        ]);
        }
    }
    public function destroy(string $id)
    {
        PaymentMethod::find($id )-> delete();
        return view('paymentmethod.index' , [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'datas' => PaymentMethod::all(),
            // 'status' => 'edit',
            'pesan' => 'Payment Method Data Has been succesfully Deleted '
            
        ]);
    }
}
