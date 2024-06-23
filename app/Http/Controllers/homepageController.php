<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Http\Request;

class homepageController extends Controller{
public function index()
{
    return home::all();
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
  if ($request->has('image'));{
  $file=$request->file('image');
  $extension=$file->getClientOriginalExtension();
  $filename=time().'.'.$extension;
  $path='imge/class';
  $file->move($path,$filename);
  }
   
    // $course = home::create($validatedData);
    $course=home::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$path.$filename,

    ]);
    
    return response()->json($course, 201);
}

public function show($id)
{
    return home::findOrFail($id);
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'sometimes|required|string|max:255',
        'description' => 'sometimes|required|string',
       'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
   
      
   
    
    $course = home::findOrFail($id);
    $course->update($validatedData);
    return response()->json($course, 200);
}

public function destroy($id)
{
    $course = home::findOrFail($id);
    $course->delete();
    return response()->json(['error' => 'Course not found'], 404);
    
    return response()->json(null, 204);
}

}