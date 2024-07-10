<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Registration;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use function Couchbase\basicDecoderV1;

class HomeController extends Controller
{
    public static function index(){
        return view('frontend.home.home',[
        ]);
    }

}
