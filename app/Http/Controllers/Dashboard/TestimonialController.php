<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name'     => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content'         => 'required|string',
            'rating'          => 'required|integer|min:1|max:5',
            'is_active'       => 'boolean',
        ]);

        Testimonial::create($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name'     => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content'         => 'required|string',
            'rating'          => 'required|integer|min:1|max:5',
            'is_active'       => 'boolean',
        ]);

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.show', compact('testimonial'));
    }
    public function trash()
    {
        $testimonials = Testimonial::onlyTrashed()->paginate(10);
        return view('dashboard.testimonials.trash', compact('testimonials'));
    }

    public function restore($id)
    {
        Testimonial::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Testimonial restored successfully.');
    }

    public function restoreAll()
    {
        Testimonial::onlyTrashed()->restore();
        return back()->with('success', 'All testimonials restored successfully.');
    }

    public function forceDelete($id)
    {
        Testimonial::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Testimonial permanently deleted.');
    }

    public function forceDeleteAll()
    {
        Testimonial::onlyTrashed()->forceDelete();
        return back()->with('success', 'Trash cleared successfully.');
    }
}
