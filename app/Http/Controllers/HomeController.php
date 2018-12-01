<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;

class HomeController extends Controller
{
    public function home(){
    	$menu = Menu::get();
    	return view('content/home', ["menu" => $menu]);
    }
    public function product_detail($id){
    	$menu = Menu::where('id',$id)->get();
    	return view('content/product_detail', ["menu" => $menu]);
    }
    public function rating(Request $request){
        $menu = Menu::where('id',$request->id)->first();
        $rating_awal = $menu->rating;
        $rating_baru = ($request->rating + $rating_awal)/2;
        Menu::where('id',$request->id)->update(['rating' => $rating_baru]);
        return redirect(url('/product_detail/'.$request->id));
    }
    public function pesan_menu(Request $request){
    	$id = $request->id;
    	$jumlah = $request->jumlah;
    	$menu = Menu::where('id',$id)->first();
    	$user = User::where('id',auth()->id())->first();
    	$data = [
    		'menu' => $menu,
    		'jumlah' => $jumlah,
    		'user' => $user,
    	];
    	return view('content/checkout', $data);
    }
    public function bayar($id,$jumlah){
    	$menu = Menu::where('id',$id)->first();
    	$sisa = ($menu->stock) - ($jumlah);
    	Menu::where('id',$id)->update(["stock" => $sisa]);
    	$user = User::where('id',auth()->id())->get();
    	$data = [
    		'menu' => $menu,
    		'jumlah' => $jumlah,
    		'user' => $user,
    	];
    	return view('content/bayar', $data);
    }

    public function saldo(){
        return view('content/saldo');
    }
    public function isiSaldo(Request $request){
        $id = auth()->id();
        $user = User::where('id',$id)->first();
        $saldo_awal = $user->saldo;
        $saldo_baru = $saldo_awal + $request->saldo;
        User::where('id',$id)->update(['saldo' => $saldo_baru]);
        return view('content/saldo');
    }
    public function pembayaran(Request $request){
        $menu = Menu::where('id',$request->id)->first();
        $user = User::where('id',auth()->id())->first();
        $stock_lama = $menu->stock;
        $stock_baru = $stock_lama - $request->jumlah;
        $saldo_lama = $user->saldo;
        $saldo_baru = $saldo_lama - $request->total;
        Menu::where('id',$request->id)->update(['stock' => $stock_baru]);
        User::where('id',auth()->id())->update(['saldo' => $saldo_baru]);
        return redirect(url('/product_detail/'.$request->id));

    }
}
