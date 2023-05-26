<?php

namespace App\Http\Controllers;

use App\Models\Map_picture;
use App\Models\MapPicture;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class MapPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show a list of the map images our drone cameras made
        $images = MapPicture::all();
        return response()->json(['message' => 'this is an images' , 'data' => $images],200);
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( )
    {
        //
    }
}
