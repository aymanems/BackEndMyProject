<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;


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

    public function changePassword(Request $request,$id)
    {
        $student = Student::find($id);
        
        if (isset($request->currentPassword)) {
            
            $cryptPass=Hash::check($request->currentPassword, $student->user->password);
        }

        if ( isset($request->newPassword) && isset($student) && $cryptPass==true ) {
            $student->user->update([
                'password' => Hash::make($request->newPassword), 
            ]);

            return response()->json(['message'=>'Le mot de passe a ete mis a jour avec succes']);
        }else
        {
            return response()->json(['message'=>'Le mot de passe n\'a pas ete mis a jour avec succes.']);
        }
        
    }
}
