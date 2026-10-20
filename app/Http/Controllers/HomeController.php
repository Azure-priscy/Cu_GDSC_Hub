<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Announcement;
use App\Models\leader;
use App\Models\Event;
use App\Models\Resource;

class HomeController extends Controller
{
public function index()
{
   $studentCount = Student::count();

$leaderCount = leader::count();

$attendanceCount = Attendance::count();

$announcementCount = Announcement::count();

$memberPresentCount = Attendance::where('status', 'present')->count();

$eventCount = Event::count();

$resourceCount = Resource::count();

$rate = $attendanceCount > 0 ? ($memberPresentCount / $attendanceCount) * 100 : 0;

$upcomingEvents = Event::whereDate('event_date', '>=', now())
    ->orderBy('event_date', 'asc')
    ->take(5)
    ->get();
    return view(
        'home',
        compact(
            'studentCount',
            'eventCount',
            'leaderCount',
            'resourceCount',
            'rate',
            'announcementCount',
            'attendanceCount',
            'upcomingEvents'
        )
    );
}
}