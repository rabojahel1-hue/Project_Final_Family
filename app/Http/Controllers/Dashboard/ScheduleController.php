<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('doctor.user')->latest()->get();
        return view('dashboard.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();
        return view('dashboard.schedules.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Schedule::create($request->all());
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully');
    }

    public function show(Schedule $schedule)
    {
        return view('dashboard.schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $doctors = Doctor::with('user')->get();
        return view('dashboard.schedules.edit', compact('schedule', 'doctors'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule->update($request->all());
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully');
    }
}
