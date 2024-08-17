<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteSettingsController extends Controller
{
    public static function siteSettings(){
        return view('admin.siteSettings.siteSettings',[
            'siteSettings' => SiteSetting::find(1),
        ]);
    }

    public static function saveSettings(Request $request){
        if($request->id == 1){
            $rules = [
                'site_title' => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->passes()){

                SiteSetting::saveInfo($request);
                return redirect(route('siteSettings'));

            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back(with(session()->flash('error', 'Settings Not Updated')));
        }
    }
}
