<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public static function saveInfo($request, $id = null){
        if($id == null){
           $project = new Project();
           $action = 'created';
        }else{
            $project = Project::find($id);
            $action = 'updated';
        }

        $project->type = $request->type;
        $project->wordpress = $request->wordpress;
        $project->name = $request->name;
        $project->link = $request->link;
        $project->desc = $request->desc;
        $project->status = $request->status;

        if ($request->file('image')){
            if ($project->image){
                if (file_exists($project->image)){
                    unlink($project->image);
                }
            }
            $project->image = self::saveImage($request);
        }

        $project->save();

        $successMessage = " $request->type Project has been " . $action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

    public static function saveImage($request){
        $image = $request->file('image');
        $imageNewName = $request->name.rand().'.'.$image->extension();
        $dir = "admin-assets/images/projects/";
        $imageUrl = $dir.$imageNewName;
        $image->move($dir,$imageUrl);
        return $imageUrl;
    }
}
