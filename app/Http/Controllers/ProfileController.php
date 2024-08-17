<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public static function profile(){
        return view('admin.profile.profile',[
            'profile' => Auth::user(),
        ]);
    }

    public static function saveProfile(Request $request){
        if($request->id == Auth::user()->id){
            $rules = [
                'name' => 'required',
                'email' => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->passes()){

                User::saveInfo($request);
                return redirect(route('profile'));

            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back(with(session()->flash('error', 'Profile Not Updated')));
        }
    }
}
