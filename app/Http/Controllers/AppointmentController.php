<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Mail\AppointmentNotification;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{


    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Non autorisé.'], 401);
        }

        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->repair_type = $request->repair_type;
        $appointment->rdv_date = $request->selectedDate;
        $appointment->save();
        return response()->json(['success' => true]);
    }


    public function deleteRdv($id)
    {
        $appointments = Appointment::findOrFail($id);
        $appointments->delete();

        return response()->json(['message' => 'Rendez-vous supprimé']);
    }
}
