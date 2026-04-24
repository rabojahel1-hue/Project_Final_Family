<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();
        return view('dashboard.services.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'duration'    => 'required|integer|min:1',
            'status'      => 'required|in:0,1',
            'doctor_id' => 'required|exists:doctors,id',
            'description' => 'nullable|string',

        ]);

        Service::create($request->all());
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function show(Service $service)
    {
        return view('dashboard.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'duration'    => 'required|integer|min:1',
            'status'      => 'required|in:0,1',
            'doctor_id'   => 'required|exists:doctors,id',
            'description' => 'nullable|string',
        ]);

        $service->update($request->all());
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }

    public function trash()
    {
        $services = Service::onlyTrashed()->with('doctor.user')->get();
        return view('dashboard.services.trash', compact('services'));
    }
    public function restore($id)
    {
        Service::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('success', 'Service restored successfully');
    }
    public function forceDelete($id)
    {
        Service::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->with('success', 'Service deleted permanently');
    }
    public function restoreAll()
    {
        Service::onlyTrashed()->restore();
        return redirect()->back()->with('success', 'All Services restored');
    }
    public function forceDeleteAll()
    {
        Service::onlyTrashed()->forceDelete();
        return redirect()->back()->with('success', 'Services trash cleared');
    }
}
