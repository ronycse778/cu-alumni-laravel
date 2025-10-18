<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventHighlight;
use App\Models\NotableEvent;
use App\Models\Story;
use App\Models\News;
use App\Models\Notice;
use App\Models\Gallery;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'event_highlights' => EventHighlight::count(),
            'notable_events' => NotableEvent::count(),
            'stories' => Story::count(),
            'news' => News::count(),
            'notices' => Notice::count(),
            'galleries' => Gallery::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
