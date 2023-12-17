<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Prospect;

class Prospactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["leads"] = Prospect::orderBy('id','DESC')->get();
        return view("admin.prospect.list", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.prospect.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prospect = new Prospect();
        $prospect->lead_owner = $request->lead_owner;
        $prospect->name = $request->name;
        $prospect->phone = $request->phone;
        $prospect->mobile = $request->mobile;
        $prospect->lead_source = $request->lead_source;
        $prospect->company = $request->company  ;
        $prospect->email = $request->email;
        $prospect->website = $request->website;
        $prospect->lead_status = $request->lead_status;
        $prospect->street = $request->street;
        $prospect->state = $request->state;
        $prospect->country = $request->country;
        $prospect->city = $request->city;
        $prospect->zipcode = $request->zipcode;
        $prospect->description = $request->description;
        $prospect->save();

        return redirect()->route('prospect.index')->withErrors([
            "Success",
            "You have successfully added !!!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
