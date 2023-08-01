<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\AtLeastThreeHobbies;

class LoginController extends Controller
{
    //
    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|min:6',
            'password' => 'required',
            'hobby' => ['required', new AtLeastThreeHobbies], 
            'instagram' => 'required',
            'gender' => 'required',
            'number' => 'required',
            'image' => 'required|image|file',
        ]);


        // Upload the image and store the path
        $validate['image'] = $request->file('image')->store('/');

        // Hash the password
        $validate['password'] = bcrypt($validate['password']);

        // Create the user record
        User::create($validate);

        return redirect('/login')->with('registerSuccess', 'You successfully registered');
    }

    public function login(Request $request){
        $validate = $request -> validate([
            'password' => 'required',
            'username' => 'required',
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            $gender = auth()->user()->gender;
            if($gender=="Man"){
                return redirect('/homeMan');
            }else{
                return redirect('/homeWoman');
            }
        }

        return redirect()->back()->with('loginError', 'Something wrong with your credentials');
    }
}
