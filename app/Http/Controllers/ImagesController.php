<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('pictures')
        //     ->with('images', Images::where('type', 'Portfolio Image')->get())
        //     ->with('transformations', );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        // $this->validate($request, [
        //     'clientname' =>'required',
        //     'image_type' => 'required',
        //     'image_upload' => 'required | file | image',
        //     'filename' => 'required | unique:images',
        //     'extension' => 'required',
        //     'date' => 'required'
        // ]);

        // $file = $request->image_upload->storeAs('images/'.$request->image_type, $request->filename.'.'.$request->extension);

        // $image = new Images;
        // $image->type = $request->image_type;
        // $image->clientname = $request->clientname;
        // $image->project_date = $request->date;
        // $image->filename = $request->filename;
        // $image->extension = $request->extension;

        // $image->save();
        
        // return view('admin-panel')
        // ->with('success', 'Saved Image successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }
}
