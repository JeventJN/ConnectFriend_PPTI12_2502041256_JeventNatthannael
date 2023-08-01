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

        $validate['image'] = $request->file('image')->store('/');
        $validate['password'] = bcrypt($validate['password']);
        $user = User::create($validate);
        $user->update(['price' => rand(100000, 125000)]);
        $paymentAmount = $request->input('payment');
        $difference = $paymentAmount - $user->price;
        if ($difference > 0) {
            $user->increment('wallet', $difference);
        }
        return view('payment', compact('user'));
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

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
