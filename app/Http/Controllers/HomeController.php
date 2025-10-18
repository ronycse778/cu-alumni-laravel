<?php

namespace App\Http\Controllers;

use App\Models\EventHighlight;
use App\Models\NotableEvent;
use App\Models\Story;
use App\Models\News;
use App\Models\Notice;
use App\Models\Gallery;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $eventHighlights = EventHighlight::where('is_active', true)->orderBy('order')->get();
        $notableEvents = NotableEvent::where('is_active', true)->orderBy('order')->take(3)->get();
        $stories = Story::where('is_active', true)->orderBy('order')->take(3)->get();
        $news = News::where('is_active', true)->orderBy('published_date', 'desc')->take(3)->get();
        $notices = Notice::where('is_active', true)->orderBy('notice_date', 'desc')->take(3)->get();
        $galleries = Gallery::where('is_active', true)->orderBy('order')->take(2)->get();
        
        $settings = Setting::pluck('value', 'key')->toArray();
        
        return view('home', compact('eventHighlights', 'notableEvents', 'stories', 'news', 'notices', 'galleries', 'settings'));
    }
    
    public function news()
    {
        $news = News::where('is_active', true)->orderBy('published_date', 'desc')->paginate(10);
        return view('news', compact('news'));
    }
    
    public function notices()
    {
        $notices = Notice::where('is_active', true)->orderBy('notice_date', 'desc')->paginate(10);
        return view('notices', compact('notices'));
    }
    
    public function gallery()
    {
        $galleries = Gallery::where('is_active', true)->orderBy('order')->paginate(12);
        return view('gallery', compact('galleries'));
    }
}
