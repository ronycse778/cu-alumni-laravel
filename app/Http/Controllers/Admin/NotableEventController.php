<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotableEvent;
use Illuminate\Http\Request;

class NotableEventController extends Controller
{
    public function index()
    {
        $notableEvents = NotableEvent::orderBy('order')->paginate(15);
        return view('admin.notable-events.index', compact('notableEvents'));
    }

    public function create()
    {
        return view('admin.notable-events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('notable-events', 'public');
        }

        NotableEvent::create($validated);
        return redirect()->route('admin.notable-events.index')->with('success', 'Notable Event created successfully.');
    }

    public function edit(NotableEvent $notableEvent)
    {
        return view('admin.notable-events.edit', compact('notableEvent'));
    }

    public function update(Request $request, NotableEvent $notableEvent)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('notable-events', 'public');
        }

        $notableEvent->update($validated);
        return redirect()->route('admin.notable-events.index')->with('success', 'Notable Event updated successfully.');
    }

    public function destroy(NotableEvent $notableEvent)
    {
        $notableEvent->delete();
        return redirect()->route('admin.notable-events.index')->with('success', 'Notable Event deleted successfully.');
    }
}
