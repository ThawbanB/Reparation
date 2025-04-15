<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;


class RepairController extends Controller
{
    public function index()
    {
        return Repair::all(); // Retourne tous les services
    }

    public function store(Request $request)
    {
        $request->validate([
            'repair_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $lastId = Repair::max('id');

        $newId = $lastId + 1;

        Repair::create([
            'id' => $newId,
            'repair_type' => $request->repair_type,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json(201);
    }


    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'repair_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $repair = Repair::findOrFail($id);

        $repair->update([
            'repair_type' => $request->repair_type,
            'description' => $request->description,
            'price' => $request->price,
        ]);
    }

    public function show($repair_type)
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();

        $repair = Repair::where('repair_type', $repair_type)->firstOrFail();

        return \Inertia\Inertia::render('ShowRepair', [
            'repair' => $repair,
            'appointments' => $appointments
        ]);
    }

    public function deleteRdv($id)
    {
        $appointments = Appointment::findOrFail($id);
        $appointments->delete();

        return response()->json(['message' => 'Rendez-vous supprimé']);
    }
}
