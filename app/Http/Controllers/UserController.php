<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function userIndex() {
        $users = User::all();

        return view('man.matching', compact('users'));
    }

    public function match($id){
        $match = User::findOrFail($id);

        return view('man.matching-detail', compact('match'));
    }

    public function update(Request $request){
        $validate = $request->validate([
            'username' => 'required',
            'image' => 'image|file',
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('/');
        }

        User::find($request->id)->update($validate);

        return redirect('/profileman');
    }

    public function topup(Request $request){
        $user = User::find(auth()->user()->id);

        $user->wallet = $user->wallet + $request->wallet;
        $user->update();

        return redirect('/homeMan');
    }
}
