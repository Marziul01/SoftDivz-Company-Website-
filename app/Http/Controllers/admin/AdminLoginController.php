<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Ramsey\Collection\Map\get;

class AdminLoginController extends Controller
{

    static protected $admin;

    public static function index(){
        return view('admin.auth.login');
    }

    public static function authenticate(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes()) {
            // Attempt authentication against the admin guard
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

                // Authentication successful, redirect to admin dashboard
                self::$admin = Auth::guard('admin')->user();
                return redirect(route('admin.dashboard'));

            } else {
                    // If both admin and user authentication fails, redirect back with error message
                    return redirect(route('admin.login'))->with('error', 'The email or password you entered is incorrect.');
            }

        } else {
            // Validation failed, redirect back with validation errors and input data
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }


}
