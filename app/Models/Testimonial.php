<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    public static function saveInfo($request, $id = null){
        if($id == null){
           $Testimonial = new Testimonial();
           $action = 'created';
        }else{
            $Testimonial = Testimonial::find($id);
            $action = 'updated';
        }

        $Testimonial->title = $request->title;
        $Testimonial->name = $request->name;
        $Testimonial->desc = $request->desc;
        $Testimonial->company = $request->company;
        if($request->status != null){
            $Testimonial->status = $request->status;
        }

        if ($request->file('image')){
            if ($Testimonial->image){
                if (file_exists($Testimonial->image)){
                    unlink($Testimonial->image);
                }
            }
            $Testimonial->image = self::saveImage($request);
        }

        $Testimonial->save();

        $successMessage = " Testimonial has been " . $action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

    public static function saveImage($request){
        $image = $request->file('image');
        $imageNewName = $request->name.rand().'.'.$image->extension();
        $dir = "admin-assets/images/testimonial/";
        $imageUrl = $dir.$imageNewName;
        $image->move($dir,$imageUrl);
        return $imageUrl;
    }
}
