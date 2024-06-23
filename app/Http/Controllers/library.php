<?php

namespace App\Http\Controllers;

use App\Models\grade;
use App\Models\libraly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class library extends Controller
{
  


    public function index()
    {
      
        $books = libraly::all();
        return response()->json($books);
    }
    public function create()
    {
      
        $grades=grade::all();
        return response()->json($grades);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'filename' => 'required|file|max:2048',
            'grade_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $filename = $file->getClientOriginalName();
            $filepath = $file->store('books', 'public');
    
            $book = libraly::create([
                'title' => $request->input('title'),
                'filename' => $filename,
                // 'filepath' => $filepath,
                'grade_id' => $request->input('grade_id'),
                'user_id' => $request->input('user_id'),
            
            ]);
    
            return response()->json($book, 201);
        } else {
            return response()->json(['errors' => 'No file uploaded'], 422);
        }
    }

    public function show($id)
    {
        $book = libraly::findOrFail($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'filename' => 'nullable|file|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $book = libraly::findOrFail($id);

        if ($request->hasFile('file')) {
            Storage::delete($book->filepath);
            $file = $request->file('filename');
            $filename = $file->getClientOriginalName();
            $filepath = $file->store('books', 'public');
            $book->filename = $filename;
            $book->filepath = $filepath;
        }

        $book->title = $request->input('title');
        $book->save();

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = libraly::findOrFail($id);
        Storage::delete($book->filepath);
        $book->delete();
        return response()->json(null, 204);
    }
}
    
