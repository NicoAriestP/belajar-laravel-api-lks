<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Society;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $society = Society::where('login_token', $request->token)->first();

        if(!$society || !$request->token) {
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $consultations = Consultation::query()
            ->with('doctor')
            ->paginate(10);

        if ($consultations) {
            return response()->json([
                'consultations' => $consultations,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Get Consultations Failed',
            ], 400);
        }
    }

    public function requestConsultation(Request $request)
    {
        $society = Society::where('login_token', $request->token)->first();

        if(!$society || !$request->token) {
            return response()->json([
                'message' => 'Unauthorized User'
            ], 401);
        }

        $validated = $request->validate([
            'disease_history' => 'required|string|max:255',
            'current_symptomps' => 'required|string|max:255'
        ]);

        $model = Consultation::create($validated);
        $model->save();

        if ($model) {
              return response()->json([
                'message' => 'Request consultation sent successful',
              ], 200);
        } else {
            return response()->json([
                'message' => 'Request Consultation Failed',
            ], 400);
        }  
    }
}
