<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.clients.clients',[
            'clients' => Client::where('status', '1')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'image' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->passes()){

            Client::saveInfo($request);
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
            'name' => 'required',
        ]);
        if ($validator->passes()){

            Client::saveInfo($request,$id);
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
        $Client = Client::find($id);

        if ($Client) {
            if (!empty($Client->image)) {

                $imagePath = public_path($Client->image);

                if (file_exists($imagePath)) {

                    unlink($imagePath);
                }
                $Client->delete();
            }else{
                $Client->delete();
            }

        }
    }
}
