<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;

class OutletController extends Controller
{
    public function menu(){
        // pindah ke model
    	$user = User::where(['id' => auth()->id()])->first();
    	$menu = Menu::where(['user_id' => auth()->id()] )->get();
    	return view('outlet/content_menu', ["user" => $user, "menu" => $menu]);
    }

    public function addmenu(Request $request){
    	$file = $request->file('foto');
    	$name = $request->name;
        $price = $request->price;
    	$desc = $request->description;
    	$user_id = auth()->id();
    	$foto = $file->getClientOriginalName();
    	$file->move('upload', $file->getClientOriginalName());
    	
    	Menu::create([
            "user_id" => $user_id,
    		"name" => $name,
            "price" => $price,
    		"description" => $desc,
    		"photo" => $foto
        ]);

    	return redirect(url('outlet/outletMenu'));
    }

    public function updatemenu(Request $request){
        $foto = "";
        $name = $request->name;
        $price = $request->price;
        $desc = $request->description;
        if ($request->foto) {
        $file = $request->file('foto');
        $foto = $file->getClientOriginalName();
        $file->move('upload', $file->getClientOriginalName());
        Menu::find($request->id)->update([
            "name" => $name,
            "price" => $price,
            "description" => $desc,
            "photo" => $foto
        ]);
        }
        else{
            Menu::find($request->id)->update([
            "name" => $name,
            "price" => $price,
            "description" => $desc
        ]);
        }
        

        return redirect(url('outlet/outletMenu'));
    }

    public function deletemenu(Request $request){
        Menu::find($request->id)->delete();

        return redirect(url('outlet/outletMenu'));
    }
}
