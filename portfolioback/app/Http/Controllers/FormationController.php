<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::latest()->get();
        return Response::json(['Formations' => $formations]);
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
        //
        $formation = new Formation();
        $formation->nom = $request->nom;
        $formation->description = $request->description;
        $formation->start = $request->start;
        $formation->end = $request->end;
        $formation->save();

        return Response::json(['Formation' => $formation]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $formation = Formation::findOrFail($id);
        return response()->json(['formation' => $formation], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {   
        $id = $request->id;
        $formation = Formation::findOrFail($id);
        $formation->nom = $request->nom;
        $formation->description = $request->description;
        $formation->start = $request->start;
        $formation->end = $request->end;
        $formation->save();

        return response()->json(['Formation' => $formation], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);
        $formation->delete();

        return response()->json(null, 204);
    }
}
