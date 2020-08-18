<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{   
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
      return CourseResource::collection(Course::all());
    }

    public function store(Request $request)
    {
      $course = Course::create([
        'course_name' => $request->course_name,
        'course_code' => $request->course_code,
      ]);

      return new CourseResource($course);
    }

    public function show(Course $course)
    {
      return new CourseResource($course);
    }

    public function update(Request $request, Course $course)
    {
      
      if ($request->user()->id !== $course->user_id) {
        return response()->json(['error' => 'You can only edit your own course.'], 403);
      }

      $course->update($request->only(['course_name', 'course_code']));

      return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
      $course->delete();

      return response()->json(null, 204);
    }
}
