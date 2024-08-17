<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public static function saveInfo($request, $id = null){
        if($id == null){
           $service = new Service();
           $action = 'created';
        }else{
            $service = Service::find($id);
            $action = 'updated';
        }

        $service->title = $request->title;
        $service->short_desc = $request->short_desc;
        $service->desc = $request->desc;
        $service->icon = $request->icon;
        $service->showHome = $request->showHome;
        if($request->status != null){
            $service->status = $request->status;
        }

        if ($request->file('image')){
            if ($service->image){
                if (file_exists($service->image)){
                    unlink($service->image);
                }
            }
            $service->image = self::saveImage($request);
        }

        $service->save();

        $successMessage = " Service has been " . $action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

    public static function saveImage($request){
        $image = $request->file('image');
        $imageNewName = $request->title.rand().'.'.$image->extension();
        $dir = "admin-assets/images/services/";
        $imageUrl = $dir.$imageNewName;
        $image->move($dir,$imageUrl);
        return $imageUrl;
    }
}
