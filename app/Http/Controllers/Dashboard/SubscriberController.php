<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::with('user')->latest()->paginate(10);
        return view('dashboard.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('dashboard.subscribers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email'   => $request->email,
            // 'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber added successfully');
    }

    public function edit(Subscriber $subscriber)
    {
        return view('dashboard.subscribers.edit', compact('subscriber'));
    }

    public function update(Request $request, Subscriber $subscriber)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email,' . $subscriber->id,
        ]);

        $subscriber->update($request->all());
        return redirect()->route('admin.subscribers.index')->with('success', 'Updated successfully');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Moved to trash');
    }

    public function trash()
    {
        $subscribers = Subscriber::onlyTrashed()->latest()->paginate(10);
        return view('dashboard.subscribers.trash', compact('subscribers'));
    }

    public function restore($id)
    {
        Subscriber::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.subscribers.trash')->with('success', 'Subscriber restored');
    }

    public function forceDelete($id)
    {
        Subscriber::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.subscribers.trash')->with('success', 'Deleted permanently');
    }

    public function restoreAll()
    {
        Subscriber::onlyTrashed()->restore();
        return redirect()->route('admin.subscribers.trash')->with('success', 'All restored');
    }

    public function forceDeleteAll()
    {
        Subscriber::onlyTrashed()->forceDelete();
        return redirect()->route('admin.subscribers.trash')->with('success', 'Trash emptied');
    }
}
