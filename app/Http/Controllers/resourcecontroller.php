<?php

namespace App\Http\Controllers;


use App\Models\resourse;
use Illuminate\Http\Request;

class resourcecontroller extends Controller
{
    public function index(Request $request)
{
    $query = resourse::query();

    
    if ($request->has('level')) {
        $query->where('level', $request->input('level'));
    }

    if ($request->has('semester')) {
        $query->where('semester', $request->input('semester'));
    }

    $courses = $query->get();

    return response()->json($courses);
}
    /**
     * Display a listing of the resource.
     */
  
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
