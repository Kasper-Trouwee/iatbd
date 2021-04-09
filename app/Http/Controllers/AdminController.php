<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user(){
        return view('admin.users', [
            'users' => \App\Models\User::all()->whereIn('role', ['Sitter', 'Pet owner']),
        ]);
    }

    public function ban(Request $request){
        $user = \App\Models\User::find($request->input('id'));
        
        $user->role = $request->input('ban');
        $user->save();

        return redirect('/content-manager/users');
    }

    public function request(){
        return view('admin.requests', [
            'messages' => \App\Models\Message::all()->where("accepted", "=", 0),
        ]);
    }

    public function delete(Request $request){
        $message = \App\Models\Message::find($request->input('id'))->delete();
        
        return redirect('/content-manager/deleterequests');
    }
}
