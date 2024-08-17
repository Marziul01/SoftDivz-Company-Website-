<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    public static function saveInfo($request){

        $SiteSetting = SiteSetting::find($request->id);
        $action = 'updated';

        $SiteSetting->site_title = $request->site_title;
        $SiteSetting->email = $request->email;
        $SiteSetting->phone = $request->phone;
        $SiteSetting->address = $request->address;
        $SiteSetting->whatsapp = $request->whatsapp;
        $SiteSetting->facebook = $request->facebook;
        $SiteSetting->linkdin = $request->linkdin;
        $SiteSetting->github = $request->github;

        if ($request->file('logo')){
            if ($SiteSetting->logo){
                if (file_exists($SiteSetting->logo)){
                    unlink($SiteSetting->logo);
                }
            }
            $SiteSetting->logo = self::saveLogo($request);
        }

        if ($request->file('favicon')){
            if ($SiteSetting->favicon){
                if (file_exists($SiteSetting->favicon)){
                    unlink($SiteSetting->favicon);
                }
            }
            $SiteSetting->favicon = self::saveFavicon($request);
        }

        $SiteSetting->save();

        $successMessage = " Site Setting has been " . $action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

    public static function saveLogo($request){
        $image = $request->file('logo');
        $imageNewName = 'logo'.rand().'.'.$image->extension();
        $dir = "admin-assets/images/settings/";
        $imageUrl = $dir.$imageNewName;
        $image->move($dir,$imageUrl);
        return $imageUrl;
    }

    public static function saveFavicon($request){
        $image = $request->file('favicon');
        $imageNewName = 'favicon'.rand().'.'.$image->extension();
        $dir = "admin-assets/images/settings/";
        $imageUrl = $dir.$imageNewName;
        $image->move($dir,$imageUrl);
        return $imageUrl;
    }
}
