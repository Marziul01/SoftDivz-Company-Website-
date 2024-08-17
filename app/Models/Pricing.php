<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    public static function saveInfo($request, $id = null){

        $services = implode(',', $request->input('services'));

        if($id == null){
           $Pricing = new Pricing();
           $action = 'created';
        }else{
            $Pricing = Pricing::find($id);
            $action = 'updated';
        }

        $Pricing->title = $request->title;
        $Pricing->price = $request->price;
        $Pricing->desc = $request->desc;
        if($request->status != null){
            $Pricing->status = $request->status;
        }
        $Pricing->services = $services;

        $Pricing->save();

        $successMessage = " Pricing has been " . $action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

}
