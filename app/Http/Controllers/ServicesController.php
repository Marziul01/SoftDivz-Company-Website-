<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.services.services',[
            'services' => Service::where('status', '1')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'icon' => 'required',
            'image' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->passes()){

            Service::saveInfo($request);
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
        //
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
            'title' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'icon' => 'required',
        ]);
        if ($validator->passes()){

            Service::saveInfo($request,$id);
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
        $Service = Service::find($id);

        if ($Service) {
            if (!empty($Service->image)) {

                $imagePath = public_path($Service->image);

                if (file_exists($imagePath)) {

                    unlink($imagePath);
                }
                $Service->delete();
            }else{
                $Service->delete();
            }

        }
    }
}
