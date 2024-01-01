<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class administratorLoginController extends Controller
{
    //-----------------------------Vérifier les informations du connexion d'administrateur-----------------------------
    public function tcheckLoginAdministrator(Request $request){
        try {
            // Validation des champs d'email et de mot de pass
            $validatedData = $request->validate([            
                'email' => 'required|email|max:40|ends_with:gmail.com,outlook.fr',
                'password' => 'required|max:10'
            ]);
            $email = $request->email;
            $password = $request->password;
            if(isset($email) && isset($password)){
                if(!empty($email) && !empty($password)){
                    // Code a exécuté.
                    return response()->json(['message' => 'true']);
                } else {
                    throw new Exception("Email et mot de passe ne peuvent pas être vides.");
                }
            } else {
                throw new Exception("Email et mot de passe doivent être définis.");
            }
        } catch (Exception $e) {
            // Gérer l'exception.
            return response()->json($e->getMessage());
        }
    }   
}
