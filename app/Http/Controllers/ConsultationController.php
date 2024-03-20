<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Society;
use App\Models\Medical;

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

        $societyConsultation = Consultation::where('society_id', $society->id)->first();

        if ($societyConsultation) {
            return response()->json([
                'message' => 'Society already have one consultation',
            ], 400);
        }

        $validated = $request->validate([
            'disease_history' => 'required|string|max:255',
            'current_symptomps' => 'required|string|max:255'
        ]);

        $model = Consultation::create($validated);
        $model->society_id = $society->id;
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

    // public function respond(Request $request, Consultation $model)
    // {
    //     $respond = $request->respond;

    //     $society = Medical::where('login_token', $request->token)->first();

    //     if(!$society || !$request->token) {
    //         return response()->json([
    //             'message' => 'Unauthorized User'
    //         ], 401);
    //     }

    //     if ($respond === 'accepted') {
    //        $model->status = 'accepted';
    //        $model->save();
    //     } elseif ($respond === 'rejected') {
    //         $model->status = 'rejected';
    //         $model->save();
    //     }
    // }
}
