<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public static function saveInfo($request, $id = null){
        if($id == null){
           $client = new Client();
           $action = 'created';
        }else{
            $client = Client::find($id);
            $action = 'updated';
        }

        $client->name = $request->name;

        if($request->status != null){
            $client->status = $request->status;
        }

        if ($request->file('image')){
            if ($client->image){
                if (file_exists($client->image)){
                    unlink($client->image);
                }
            }
            $client->image = self::saveImage($request);
        }

        $client->save();

        $successMessage = " Client has been " . $action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

    public static function saveImage($request){
        $image = $request->file('image');
        $imageNewName = $request->title.rand().'.'.$image->extension();
        $dir = "admin-assets/images/client/";
        $imageUrl = $dir.$imageNewName;
        $image->move($dir,$imageUrl);
        return $imageUrl;
    }
}
