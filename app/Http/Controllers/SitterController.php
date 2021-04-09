<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SitterController extends Controller
{
    public function create($id){
        return view('sitter.create', [
            'pet' => \App\Models\Pet::find($id),
            'sitter' => \Auth::user()
        ]);
    }

    public function store(Request $request, \App\Models\Message $message){
        $message->message = $request->input('message');
        $message->petid = $request->input('petid');
        $message->sitterid = $request->input('sitterid');

        try {
            $message->save();
            return redirect('/');
            
        } catch (Exception $e) {
            return redirect('/');  
        }
    }

    public function update(){

        return view('sitter.update', [
            'sitter' => \Auth::user(),
        ]);
    }

    public function upload(Request $request, \App\Models\SitterView $view){
        $request->validate([
            'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);

        $random = Str::random(40);

        $path = $request->image->storeAs('sitter_' . $request->input('sitterid'), $random . '.jpg', 'public_uploads');
       
        $view->imagefolder = 'sitter_' . $request->input('sitterid');
        $view->sitterid = $request->input('sitterid');

        $view->save();

        return redirect('/sitter/edit');
    }

    public function show($id){
        $reviews = array();
        $user = \App\Models\User::find($id);
        $view = \App\Models\SitterView::where('sitterid', '=', $user->id)->first();
        $requests = \App\Models\Message::where('sitterid', $user->id)->get();

        foreach($requests as $request){
            $review = \App\Models\Review::where('messageid' , '=' , $request->id)->get();
            if($review->isEmpty()){}
            else{
                $reviews[] = $review;
            }
        }
        
        try {
            $files = File::glob('image/' . $view->imagefolder . '/*');
        } catch (\Throwable $th) {
            $files = array();
        }

        return view('sitter.view', [
            'sitter' => $user,
            'files' => $files,
            'reviews' => $reviews,
        ]);
    }

    public function index(){
        return view('sitter.index', [
            'sitters' => \App\Models\User::where('role', 'Sitter')->get(),
            ]);
    }
}
