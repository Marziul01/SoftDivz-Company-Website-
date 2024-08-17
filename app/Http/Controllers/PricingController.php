<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.pricings.pricings',[
            'pricings' => Pricing::where('status', '1')->get(),
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
            'price' => 'required',
            'desc' => 'required',
            'services' => 'required|array',
            'services.*' => 'string',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->passes()){

            Pricing::saveInfo($request);
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
            'price' => 'required',
            'desc' => 'required',
            'services' => 'required|array',
            'services.*' => 'string',
        ]);
        if ($validator->passes()){

            Pricing::saveInfo($request,$id);
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
        $Pricing = Pricing::find($id);
        $Pricing->delete();
        return back();
    }
}
