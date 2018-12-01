<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    public function outlet(){
        $admin = User::find(auth()->id())->first();
    	$user = User::where(['level' => 'outlet'])->get();
    	return view('admin/content_outlet',['user' => $user, 'admin' => $admin]);
    }
    public function deleteOutlet(Request $request){
        User::find($request->Id)->delete();
        return redirect(url('admin/outlet'));
    }

    public function member(){
        $admin = User::find(auth()->id())->first();
    	$user = User::where(['level' => 'member'])->get();
    	return view('admin/content_member',['user' => $user, 'admin' => $admin]);
    }
    public function deleteMember(Request $request){
        User::find($request->Id)->delete();
        return redirect(url('admin/member'));
    }
}
