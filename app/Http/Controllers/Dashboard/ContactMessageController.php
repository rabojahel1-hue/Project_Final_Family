<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('dashboard.contact_messages.index', compact('messages'));
    }

    public function create()
    {
        return view('dashboard.contact_messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            // 'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.contact_messages.index')->with('success', 'Sent successfully');
    }

    public function edit(ContactMessage $contactMessage)
    {
        return view('dashboard.contact_messages.edit', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contactMessage->update($request->all());
        return redirect()->route('admin.contact_messages.index')->with('success', 'Updated successfully');
    }

    public function show(ContactMessage $contactMessage)
    {
        $contactMessage->markAsRead();
        return view('dashboard.contact_messages.show', compact('contactMessage'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact_messages.index')->with('success', 'Moved to trash');
    }

    public function trash()
    {
        $messages = ContactMessage::onlyTrashed()->latest()->paginate(10);
        return view('dashboard.contact_messages.trash', compact('messages'));
    }

    public function restore($id)
    {
        ContactMessage::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.contact_messages.trash');
    }

    public function forceDelete($id)
    {
        ContactMessage::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.contact_messages.trash');
    }

    public function restoreAll()
    {
        ContactMessage::onlyTrashed()->restore();
        return redirect()->route('admin.contact_messages.trash');
    }

    public function forceDeleteAll()
    {
        ContactMessage::onlyTrashed()->forceDelete();
        return redirect()->route('admin.contact_messages.trash');
    }
}
