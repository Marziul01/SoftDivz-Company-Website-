<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\Quiz;
use App\Models\Registration;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use function Couchbase\basicDecoderV1;

class HomeController extends Controller
{
    public static function index(){

        $allServices = [];
        $pricings = Pricing::where('status', 1)->get();
        foreach ($pricings as $pricing) {
            $services = explode(',', $pricing->services);
            $allServices = array_merge($allServices, $services);
        }
        return view('frontend.home.home',[
            'services' => Service::where('status',1)->where('showHome', 1)->get(),
            'softwares' => Project::where('type', 'Software')->get(),
            'websites' => Project::where('type', 'Website')->where('wordpress', 2)->get(),
            'wordpresss' => Project::where('type', 'Website')->where('wordpress', 1)->get(),
            'pricings' => $pricings,
            'Infos' => $allServices,
            'clients' => Client::where('status',1)->get(),
            'testimonials' => Testimonial::where('status',1)->get(),
        ]);
    }

}
