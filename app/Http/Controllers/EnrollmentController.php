<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Enrollment;
use App\Http\Resources\EnrollmentResource;
use DB;

class EnrollmentController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function store(Request $request, Course $course)
    {
      $enrollment = Enrollment::firstOrCreate(
        [
          'user_id' => $request->user()->id,
          'course_id' => $course->id,
        ],
        
      );

      return new EnrollmentResource($enrollment);
    }

   
}
