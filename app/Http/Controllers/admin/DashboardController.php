<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Registration;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.dashboard',[

        ]);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
