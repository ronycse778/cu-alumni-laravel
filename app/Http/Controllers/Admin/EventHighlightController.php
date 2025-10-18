<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventHighlight;
use Illuminate\Http\Request;

class EventHighlightController extends Controller
{
    public function index()
    {
        $eventHighlights = EventHighlight::orderBy('order')->paginate(15);
        return view('admin.event-highlights.index', compact('eventHighlights'));
    }

    public function create()
    {
        return view('admin.event-highlights.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        EventHighlight::create($validated);
        return redirect()->route('admin.event-highlights.index')->with('success', 'Event Highlight created successfully.');
    }

    public function edit(EventHighlight $eventHighlight)
    {
        return view('admin.event-highlights.edit', compact('eventHighlight'));
    }

    public function update(Request $request, EventHighlight $eventHighlight)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $eventHighlight->update($validated);
        return redirect()->route('admin.event-highlights.index')->with('success', 'Event Highlight updated successfully.');
    }

    public function destroy(EventHighlight $eventHighlight)
    {
        $eventHighlight->delete();
        return redirect()->route('admin.event-highlights.index')->with('success', 'Event Highlight deleted successfully.');
    }
}
