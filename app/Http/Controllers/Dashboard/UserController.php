<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {

        if ($request->status == 'trashed') {
            $users = User::onlyTrashed()->get();
        } else {
            $users = User::latest()->get();
        }
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,doctor,patient,assistant',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'phone'    => $request->phone,
            'gender'   => $request->gender,
            'status'   => $request->status ?? 1,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required',
        ]);

        $data = $request->except('password');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('dashboard.users.trash', compact('users'));
    }

    public function restore($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('success', 'User restored successfully');
    }

    public function restoreAll()
    {
        User::onlyTrashed()->restore();
        return redirect()->back()->with('success', 'All users restored');
    }

    public function forceDelete($id)
    {
        User::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->with('success', 'User permanently deleted');
    }

    public function forceDeleteAll()
    {
        User::onlyTrashed()->forceDelete();
        return redirect()->back()->with('success', 'Trash cleared successfully');
    }
}
