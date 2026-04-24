<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{

    public function index()
    {
        $links = SocialLink::with('linkable.user')->latest()->paginate(10);
        return view('dashboard.social_links.index', compact('links'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();
        return view('dashboard.social_links.create', compact('doctors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'platform'  => 'required|string|max:50',
            'url'       => 'required|url',
            'doctor_id' => 'required|integer',
        ]);

        SocialLink::create([
            'platform'      => $request->platform,
            'url'           => $request->url,
            'linkable_id'   => $request->doctor_id,
            'linkable_type' => 'Doctor',
        ]);

        return redirect()->route('admin.social-links.index')->with('success', 'Created!');
    }


    public function edit($id)
    {
        $link    = SocialLink::findOrFail($id);
        $doctors = Doctor::with('user')->get();
        return view('dashboard.social_links.edit', compact('link', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $link = SocialLink::findOrFail($id);

        $request->validate([
            'platform'    => 'required|string|max:50',
            'url'         => 'required|url',
            'linkable_id' => 'required|integer',
        ]);

        $link->update([
            'platform'    => $request->platform,
            'url'         => $request->url,
            'linkable_id' => $request->linkable_id,
        ]);

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link updated successfully!');
    }

    public function destroy($id)
    {
        $link = SocialLink::findOrFail($id);
        $link->delete();
        return redirect()->route('admin.social-links.index')->with('success', 'Deleted Forever!');
    }

}
