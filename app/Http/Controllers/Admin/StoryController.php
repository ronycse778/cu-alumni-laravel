<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('order')->paginate(15);
        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('stories', 'public');
        }

        Story::create($validated);
        return redirect()->route('admin.stories.index')->with('success', 'Story created successfully.');
    }

    public function edit(Story $story)
    {
        return view('admin.stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('stories', 'public');
        }

        $story->update($validated);
        return redirect()->route('admin.stories.index')->with('success', 'Story updated successfully.');
    }

    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('admin.stories.index')->with('success', 'Story deleted successfully.');
    }
}
