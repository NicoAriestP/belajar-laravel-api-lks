<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotVaccine;
use App\Models\Society;

class SpotVaccineController extends Controller
{
    public function index(Request $request)
    {
        $society = Society::where('login_token', $request->token)->first();

        if(!$society || !$request->token) {
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $models = SpotVaccine::query()
                ->with(['spot', 'vaccine'])
                ->paginate(10);

        if ($models) {
            return response()->json([
                'spots' => $models,
            ], 200);
        }

    }
}
