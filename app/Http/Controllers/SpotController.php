<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;
use App\Models\Society;

class SpotController extends Controller
{
    public function index(Request $request)
    {
        $society = Society::where('login_token', $request->token)->first();

        if(!$society || !$request->token) {
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $models = Spot::query()
                ->with(['spotVaccines.vaccine'])
                ->paginate(10);

        if ($models) {
            return response()->json([
                'spots' => $models
            ], 200);
        }
    }

    public function detail(Request $request, Spot $model)
    {
        $date = $request->date;
        $society = Society::where('login_token', $request->token)->first();

        if(!$society || !$request->token) {
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        } 

        $model->load(['vaccinations']);

        if ($model) {
            return response()->json([
                'date' => $date,
                'spot' => $model,
                'vaccinations_count' => $model->vaccinations->count(),
            ], 200);    
        }
    }
}
