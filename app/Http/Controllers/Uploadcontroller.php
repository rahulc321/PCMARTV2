<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uploads_settings;

class Uploadcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.upload.module.add");
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // echo '<pre>';print_r($_FILES);die;

        $us = new Uploads_settings();
        $us->type = $request->type;
        $us->path = $request->path;
        $us->from_s = $request->from_s;
        $us->to_s = $request->to_s;
        $us->company = $request->company;
        $us->description = $request->description;
        $us->save();

        return redirect('/app/uploads')->withErrors([
            "success",
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
         Uploads_settings::where('id',$id)->delete();
          return redirect('/app/uploads')->withErrors([
            "success",
            "You have successfully deleted !!!",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $this->data['edit'] = Uploads_settings::where('id',$id)->first();
         return view("admin.upload.module.edit",$this->data);
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
        $us = Uploads_settings::where('id',$id)->first();
        $us->type = $request->type;
        $us->path = $request->path;
        $us->from_s = $request->from_s;
        $us->to_s = $request->to_s;
        $us->company = $request->company;
        $us->description = $request->description;
        $us->save();

        return redirect('/app/uploads')->withErrors([
            "success",
            "You have successfully updated !!!",
        ]);
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
