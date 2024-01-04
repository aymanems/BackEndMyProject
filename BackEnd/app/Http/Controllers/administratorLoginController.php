<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class administratorLoginController extends Controller
{
    public function tcheckLoginAdministrator(Request $request){
        try {
    

            $credentials = ['email' => $request->email, 'password' => $request->password];
    
            if (Auth::attempt($credentials)) {
                
                return response()->json(['message' => 'true']);
            } else {
                
                return response()->json(['message' => 'false']);
            }
    
            
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
      

    }
    
}
