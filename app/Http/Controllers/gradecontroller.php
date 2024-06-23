<?php

namespace App\Http\Controllers;

use App\Models\grade;
use Illuminate\Http\Request;

class gradecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    return grade::all();
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
        try {
            $validated=$request->validated();
            $grade=new grade();
            $grade->name=$request->name;
            $grade->save();
            return response()->json(['error' => 'grade  found'], 202);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => 'grade not found'], 404);
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
        try {
            $validated=$request->validated();
            $grade=new grade();
            $grade->name=$request->name;
            $grade->save();
            return response()->json(['error' => 'grade  found'], 202);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => 'grade not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade=grade::findOrFail($id)->delete();
        return response()->json(['error' => 'grade delete']);
    }
}
