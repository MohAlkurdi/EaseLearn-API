<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    //
    public function enrollCourse(Request $request, $courseId)
    {
        $user = Auth::user();
        $certificate = Certificate::where('user_id', $user->id)->where('course_id', $courseId)->first();

        if ($certificate) {
            return response()->json(['message' => 'You are already enrolled in this course.'], 400);
        }

        $certificate = new Certificate();
        $certificate->unique_number = uniqid();
        $certificate->user_id = $user->id;
        $certificate->course_id = $courseId;
        $certificate->save();

        return response()->json(['message' => 'Enrollment successful.', 'certificate' => $certificate], 201);
    }

    public function getUserCourses()
    {
        $user = Auth::user();

        // Retrieve the user's certificates with the associated course information
        $certificates = Certificate::where('user_id', $user->id)->with('course')->get();

        if ($certificates->isEmpty()) {
            return response()->json(['message' => 'No courses found.'], 404);
        }

        return response()->json(['certificate' => $certificates], 200);
    }
}
