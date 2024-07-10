<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Prompts\Prompt;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.project.software',[
            'projects' => Project::where('type', 'Software')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.website',[
            'projects' => Project::where('type', 'Website')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'link' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->passes()){

                Project::saveInfo($request);
                return back();

        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'link' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ]);
        if ($validator->passes()){

            Project::saveInfo($request,$id);
            return back();

        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if ($project) {
            if (!empty($project->image)) {

                $imagePath = public_path($project->image);

                if (file_exists($imagePath)) {

                    unlink($imagePath);
                }
                $project->delete();
            }else{
                $project->delete();
            }

        }
        return back();
    }
}
