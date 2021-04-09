<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PetController extends Controller
{
    public function create(Request $request){
        $user = \Auth::user();
        
        return view('petowner.register', [
            'owner' => $user,
            'kinds_of_pets' => \App\Models\PetKind::all()]);
    }

    public function store(Request $request, \App\Models\Pet $pet){

        $request->validate([
            'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);

        $random = Str::random(40);

        $path = $request->image->storeAs('pet', $random . '.jpg', 'public_uploads');

        $pet->name = $request->input('name');
        $pet->kind = $request->input('kind');
        $pet->age = $request->input('age');
        $pet->description = $request->input('description');
        $pet->price = $request->input('price');
        $pet->startDate = $request->input('startDate');
        $pet->endDate = $request->input('endDate');
        $pet->image =  '/image/' . $path;
        $pet->ownerid = $request->input('owner_id');

        try {
            $pet->save();
            return redirect('/');
            
        } catch (Exception $e) {
            return redirect('/petowner/register');  
        }
    }

    public function showuser($id){
        $user = \App\Models\User::find($id);
        if($user->role === 'Pet owner'){
            return view('petowner.showuser', [
                'owner' => $user,
                'pets' => \App\Models\Pet::where('ownerid' , '=' , $user->id)->get()]);
        }
        else{
            return redirect('/');
        }
    }

    public function indexuser(){
        return view('petowner.indexuser', [
            'petowners' => \App\Models\User::where('role', 'Pet owner')->get(),
            ]);
    }

    public function show($id){
        return view('petowner.show', [
            'pet' => \App\Models\Pet::find($id),
        ]);
    }

    public function showrequests(){
        $requests = array();
        $pets_array = array();
        $user = \Auth::user();
        $pets = \App\Models\Pet::where('ownerid' , '=' , $user->id)->get();
        foreach($pets as $pet){
            $request = \App\Models\Message::where([['petid' , '=' , $pet->id], ['accepted', '=', 0]])->get();
            if($request->isEmpty()){}
            else{
                $requests[] = $request;
            }
        }

        foreach($requests as $req){
            $pet = \App\Models\Pet::where('id' , '=' , $req[0]->petid)->get();
            $pets_array[] = $pet;
        }

        return view('petowner.showrequests', [
            'requests' => $requests,
            'pets' => $pets_array,
            'user' => $user,
        ]);
    }

    public function storerequests(Request $request){
        $message = \App\Models\Message::find($request->input('id'));
        
        $message->accepted = $request->input('accept');
        $message->save();

        return redirect('/petowner/requests');
    }

    public function index(){
        return view('petowner.index', [
            'pets' => \App\Models\Pet::all(),
            'kinds_of_pets' => \App\Models\PetKind::all(),
        ]);
    }

    public function review(){
        $requests = array();
        $pets_array = array();
        $user = \Auth::user();
        $sitters= \App\Models\User::all();
        $pets = \App\Models\Pet::where('ownerid' , '=' , $user->id)->get();
        foreach($pets as $pet){
            $request = \App\Models\Message::where([['petid' , '=' , $pet->id], ['accepted', '=', 1]])->get();
            if($request->isEmpty()){}
            else{
                $requests[] = $request;
            }
        }

        foreach($requests as $req){
            $pet = \App\Models\Pet::where('id' , '=' , $req[0]->petid)->get();
            $pets_array[] = $pet;
        }

        return view('petowner.review', [
            'requests' => $requests,
            'user' => $user,
            'sitters' => $sitters,
            'pets' => $pets_array,
        ]);
    }

    public function storereview(Request $request, \App\Models\Review $review){
        $review->messageid = $request->input('id');
        $review->ownername = $request->input('name');
        $review->petname = $request->input('pet');
        $review->review = $request->input('review');

        $review->save();

        $message = \App\Models\Message::find($request->input('id'));

        $message->accepted = 3;

        $message->save();

        return redirect('/review');
    }
}
