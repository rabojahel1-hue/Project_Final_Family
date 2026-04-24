<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with('user')->latest()->get();
        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $users = User::where('role', 'doctor')->whereDoesntHave('doctor')->get();
        return view('dashboard.doctors.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'title'    => 'required',
            'image'    => 'nullable|image|max:2048',
        ]);

        try {
            DB::beginTransaction();
            $imagePath = 'default_avatar.png';
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('users_images', 'public');
            }
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'doctor',
                'image'    => $imagePath,
            ]);

            $doctor = Doctor::create([
                'user_id'   => $user->id,
                'title'     => $request->title,
                'education' => $request->education,
            ]);

            DB::commit();
            return redirect()->route('admin.doctors.index')->with('success', 'Doctor added successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('dashboard.doctors.show', compact('doctor'));
    }

    public function edit(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->load('user');
        return view('dashboard.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, string $id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $doctor->user_id,
            'title'     => 'required|string|max:255',
            'image'     => 'nullable|image|max:2048',
            'education' => 'nullable|string',

        ]);

        try {
            DB::beginTransaction();
            $userData = [
                'name'  => $request->name,
                'email' => $request->email,
            ];

            if ($request->hasFile('image')) {
                $imagePath         = $request->file('image')->store('users_images', 'public');
                $userData['image'] = $imagePath;
            }

            $doctor->user->update($userData);
            $doctor->update([
                'title'     => $request->title,
                'education' => $request->education,
                'description_1' => $request->description_1,
            ]);

            DB::commit();
            return redirect()->route('admin.doctors.index')->with('success', 'Doctor profile updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor profile removed successfully!');
    }

    public function trash()
    {
        $doctors = Doctor::onlyTrashed()->get();
        return view('dashboard.doctors.trash', compact('doctors'));
    }
    public function restore($id)
    {
        Doctor::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('success', 'Doctor restored successfully');
    }
    public function forceDelete($id)
    {
        Doctor::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->with('success', 'Doctor deleted permanently');
    }
    public function restoreAll()
    {
        Doctor::onlyTrashed()->restore();
        return redirect()->back()->with('success', 'All doctors restored');
    }
    public function forceDeleteAll()
    {
        Doctor::onlyTrashed()->forceDelete();
        return redirect()->back()->with('success', 'Doctors trash cleared');
    }
}
