<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;


class administratorLoginController extends Controller
{
    public function tcheckLoginAdministrator(Request $request){
        try {

            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if ($validatedData)
             {
                $credentials = ['email' => $request->email, 'password' => $request->password];
    
                if (Auth::attempt($credentials)) {
                    $authenticatedUser = Auth::user();

                    
                    $email = $authenticatedUser->email;

                     $students = Student::with('user')
                    ->whereHas('user', function ($query) use ($email) {
                        $query->where('email', $email);
                    })
                    ->get();

                    return response()->json(['message' => 'true','students'=>$students]);

                } else {
                    
                    return response()->json(['message' => 'false']);
                    
                }
            }else{

            return response()->json(['message' => 'falsere']);
            
            }
    

            
    
            
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
      

    }

 
}
