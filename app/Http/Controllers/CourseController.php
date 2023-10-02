<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all courses
        $course = Course::all();
        // return a message if there's no courses
        if ($course->isEmpty()) {
            return response()->json([
                'message' => 'No courses found'
            ], 404);
        }
        return $course;
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
        // validate the request
        $request->validate([
            'name' => 'required|unique:courses|max:255',
            'slug' => 'required|unique:courses|max:255',
            'description' => 'required',
        ]);
        // create a new course
        return Course::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return response()->json([
                'message' => 'No course found'
            ], 404);
        }
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
        $course = Course::find($id);
        $course->update($request->all());
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Course::destroy($id);
    }

    /**
     * Search for a name
     */
    public function search(string $name)
    {
        $course = Course::where('name', 'like', "%$name%")->get();
        if ($course->isEmpty()) {
            return response()->json([
                'message' => 'No courses found'
            ], 404);
        }
        return $course;
    }
}
