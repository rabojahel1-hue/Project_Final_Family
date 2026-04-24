<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['patient', 'doctor.user', 'service'])->latest()->paginate(15);
        return view('dashboard.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $doctors  = Doctor::with('user')->get();
        $services = Service::all();
        return view('dashboard.bookings.create', compact('doctors', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name'  => 'required|string',
            'patient_phone' => 'required',
            'doctor_id'     => 'required|exists:doctors,id',
            'service_id'    => 'required|exists:services,id',
            'booking_date'  => 'required|date',
            'booking_time'  => 'required',
        ]);

        $validated['status'] = 'pending';

        Booking::create($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Sent successfully');
    }

    public function show($id)
    {
        $booking = Booking::with(['doctor.user', 'service'])->findOrFail($id);
        return view('dashboard.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking  = Booking::findOrFail($id);
        $doctors  = Doctor::with('user')->get();
        $services = Service::all();

        return view('dashboard.bookings.edit', compact('booking', 'doctors', 'services'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'patient_name'  => 'required|string',
            'patient_phone' => 'required',
            'doctor_id'     => 'required|exists:doctors,id',
            'service_id'    => 'required|exists:services,id',
            'booking_date'  => 'required|date',
            'booking_time'  => 'required',
            'status'        => 'required',
        ]);

        try {
            $booking->update($validated);
            return redirect()->route('admin.bookings.index')->with('success', 'Appointment Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating: ' . $e->getMessage());
        }
    }
    
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }

    public function restore($id)
    {
        Booking::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Booking restored');
    }

    public function trash()
    {
        $bookings = Booking::onlyTrashed()->paginate(10);
        return view('dashboard.bookings.trash', compact('bookings'));
    }

    public function restoreAll()
    {
        Booking::onlyTrashed()->restore();
        return redirect()->back()->with('success', 'All bookings restored successfully.');
    }

    public function forceDelete($id)
    {
        Booking::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->with('success', 'Booking permanently deleted.');
    }

    public function forceDeleteAll()
    {
        Booking::onlyTrashed()->forceDelete();
        return redirect()->back()->with('success', 'Trash cleared successfully.');
    }
}
