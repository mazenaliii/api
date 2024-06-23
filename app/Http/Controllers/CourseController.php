<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;



class CourseController extends Controller
{
    public function enroll(Request $request)
    {
        
        $enrollment = Course::create([
            "user_id"=>auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'progress' => 0,
        ]);

        return response()->json($enrollment, 201);
    }

    public function index(Request $request)
    {
        $enrollments = User::with('courses')->find(auth()->user()->id);
        return response()->json($enrollments);
    }

    public function updateProgress(Request $request, $id)
    {
        $enrollment = $request->user()->enrollments()->findOrFail($id);
        $enrollment->update(['progress' => $request->input('progress')]);
        return response()->json($enrollment);
    }

    public function destroy(Request $request, $id)
    {
        $enrollment = $request->user()->enrollments()->findOrFail($id);
        $enrollment->delete();
        return response()->json(['message' => 'Course enrollment deleted']);
    }
}