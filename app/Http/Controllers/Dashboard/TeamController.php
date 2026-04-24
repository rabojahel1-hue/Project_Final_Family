<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $members = Team::latest()->paginate(10);
        return view('dashboard.team.index', compact('members'));
    }

    public function create()
    {
        return view('dashboard.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'position'     => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'twitter_url'  => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'is_active'    => 'boolean',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/team'), $filename);
            $data['image'] = 'uploads/team/' . $filename;
        }

        Team::create($data);
        return redirect()->route('admin.team.index')->with('success', 'Member added successfully.');
    }

    public function edit(Team $team)
    {
        return view('dashboard.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'position'     => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio'          => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'twitter_url'  => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'is_active'    => 'boolean',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة من الجهاز
            if ($team->image && File::exists(public_path($team->image))) {
                File::delete(public_path($team->image));
            }

            $file     = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/team'), $filename);
            $data['image'] = 'uploads/team/' . $filename;
        }

        $team->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Moved to trash.');
    }

    public function forceDelete($id)
    {
        $member = Team::withTrashed()->findOrFail($id);
        if ($member->image && File::exists(public_path($member->image))) {
            File::delete(public_path($member->image));
        }
        $member->forceDelete();
        return redirect()->back()->with('success', 'Deleted permanently.');
    }

    public function show(Team $team)
    {return view('dashboard.team.show', compact('team'));}
    public function trash()
    {$members = Team::onlyTrashed()->paginate(10);return view('dashboard.team.trash', compact('members'));}
    public function restore($id)
    {Team::withTrashed()->findOrFail($id)->restore();return redirect()->back();}
}
