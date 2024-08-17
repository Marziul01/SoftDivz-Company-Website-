<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.testimonials.testimonials',[
            'testimonials' => Testimonial::where('status', '1')->get(),
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
            'name' => 'required',
            'company' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->passes()){

            Testimonial::saveInfo($request);
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
            'name' => 'required',
            'company' => 'required',
            'desc' => 'required',
        ]);
        if ($validator->passes()){

            Testimonial::saveInfo($request,$id);
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
        $Testimonial = Testimonial::find($id);

        if ($Testimonial) {
            if (!empty($Testimonial->image)) {

                $imagePath = public_path($Testimonial->image);

                if (file_exists($imagePath)) {

                    unlink($imagePath);
                }
                $Testimonial->delete();
            }else{
                $Testimonial->delete();
            }

        }
    }
}
