<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\EventHighlight;
use App\Models\NotableEvent;
use App\Models\Story;
use App\Models\News;
use App\Models\Notice;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        EventHighlight::create([
            'title' => 'আহবায়ক পরিষদ',
            'description' => 'সুমেলানী ২০২৫',
            'icon' => 'fas fa-users',
            'order' => 1,
            'is_active' => true,
        ]);

        EventHighlight::create([
            'title' => 'প্রতিনিধি নির্বাচন',
            'description' => 'সুমেলানী ২০২৫',
            'icon' => 'fas fa-vote-yea',
            'order' => 2,
            'is_active' => true,
        ]);

        NotableEvent::create([
            'title' => 'Annual Alumni Meet 2025',
            'description' => 'Join us for the annual alumni gathering',
            'event_date' => now()->addDays(30),
            'order' => 1,
            'is_active' => true,
        ]);

        Story::create([
            'title' => 'Alumni Being Computer Science to Low Income High Schools Nationwide',
            'description' => 'Our alumni are making a difference by bringing computer science education to underserved communities.',
            'author' => 'John Doe',
            'published_date' => now(),
            'order' => 1,
            'is_active' => true,
        ]);

        Story::create([
            'title' => 'AI-Fuji - A financial app startup',
            'description' => 'Alumni-founded startup revolutionizing financial technology.',
            'author' => 'Jane Smith',
            'published_date' => now()->subDays(5),
            'order' => 2,
            'is_active' => true,
        ]);

        News::create([
            'title' => 'শীতকালীন সমাবেশ ২০২৫',
            'description' => 'চট্টগ্রাম বিশ্ববিদ্যালয় প্রাক্তন ছাত্র সমিতির শীতকালীন সমাবেশ অনুষ্ঠিত হবে।',
            'published_date' => now(),
            'order' => 1,
            'is_active' => true,
        ]);

        News::create([
            'title' => 'বার্ষিক ও সাধারণ সভা',
            'description' => 'আগামী মাসে বার্ষিক সাধারণ সভা অনুষ্ঠিত হবে।',
            'published_date' => now()->subDays(3),
            'order' => 2,
            'is_active' => true,
        ]);

        Notice::create([
            'title' => 'সুমেলানী ২০২৫',
            'description' => 'সুমেলানী ২০২৫ এর জন্য নিবন্ধন শুরু হয়েছে।',
            'notice_date' => now()->addDays(7),
            'order' => 1,
            'is_active' => true,
        ]);

        Notice::create([
            'title' => 'বার্ষিক ও সাধারণ সভা',
            'description' => 'বার্ষিক সাধারণ সভার তারিখ ঘোষণা করা হয়েছে।',
            'notice_date' => now()->addDays(15),
            'order' => 2,
            'is_active' => true,
        ]);

        Setting::create(['key' => 'total_members', 'value' => '30,000']);
        Setting::create(['key' => 'total_countries', 'value' => '56']);
        Setting::create(['key' => 'total_chapters', 'value' => '54']);
        Setting::create(['key' => 'programming_text', 'value' => 'THREE DIRECTIONS: THE UNIVERSITY, THE STUDENT BODY AND CONNECT ALUMNI TO EACH OTHER AND BACK TO THE UNIVERSITY']);
    }
}
