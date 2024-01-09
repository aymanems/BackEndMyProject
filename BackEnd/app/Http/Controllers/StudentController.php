<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with('user')
        ->whereHas('user', function ($query) use ($request) {
            $query->where('email', $request->email);
        })
        ->get();
        return  response()->json(['student'=>$students]);
    }

    public function updateProfileImage(Request $request,$id)
    {
        $imageFile = $request->file('image')->store('images', 'public');
        $students = Student::find($id);
        $students->picture=$imageFile;
        $students->save();

        
        return response()->json(['message' => 'Profile image updated successfully']);
    }

    public function getProfileImage($id)
    {
    $student = Student::find($id);

    if (!$student) {
        return response()->json(['error' => 'Student not found'], 404);
    }

    $imageUrl = asset('storage/' . $student->picture);

    return response()->json(['imageUrl' => $imageUrl]);
    }
}
