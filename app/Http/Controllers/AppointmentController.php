<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::orderByDesc('id')->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        DB::transaction(function() use ($request) {
            $validated=$request->validated();

            if($request->hasFile('icon')){
                $iconPath=$request->file('icon')->store('icons', 'public');
                $validated['icon']=$iconPath;
            }

            $newAppointment = Appointment::create($validated);

        });
        
        return redirect()->route('admin.appointments.index');
    
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
            return view('admin.appointments.edit', compact('appointment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
        DB::transaction(function () use ($appointment) {
            $appointment->delete();
        });
    
        return redirect()->route('admin.appointments.index');
    }
}
