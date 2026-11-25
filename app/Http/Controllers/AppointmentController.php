<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private function rules(): array
    {
        return [
            'user'               => 'required|string|max:255',
            'client_name'        => 'required|string|max:255',
            'date'               => 'required|date',
            'time'               => 'required',
            'appointment_status' => 'required|in:Pending,Confirmed,Completed,Cancelled',
        ];
    }

    public function index()
    {
        $appointments = Appointment::latest()->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        Appointment::create($request->validate($this->rules()));

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created.');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update($request->validate($this->rules()));

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted.');
    }
}