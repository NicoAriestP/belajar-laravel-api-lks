<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $idCardNumber = $request->id_card_number;
        $password = $request->password;

        dd($idCardNumber, $password);

        $society = Society::where('id_card_number', $request->id_card_number)
                            ->where('password', $request->password)
                            ->with('regional')
                            ->first();

        if(!$society || !$request->id_card_number || !$request->password) {
            return response()->json([
                'message' => 'Id Card Number or Password incorrect'
            ], 401);
        }

        $token = md5($society->id_card_number);
        $society->login_token = $token;
        $society->save();
        $society->token = $token;

        return response()->json([
            'data' => $society,
        ], 200);
    }
}
