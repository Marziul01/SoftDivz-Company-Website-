<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public static function about(){
        return view('frontend.pages.about',[

        ]);
    }

    public static function services(){
        return view('frontend.pages.services',[

        ]);
    }

    public static function projects(){
        return view('frontend.pages.projects',[

        ]);
    }

    public static function pricing(){
        return view('frontend.pages.pricing',[

        ]);
    }

    public static function contact(){
        return view('frontend.pages.contact',[

        ]);
    }

    public static function hire(){
        return view('frontend.pages.hire',[

        ]);
    }
}
