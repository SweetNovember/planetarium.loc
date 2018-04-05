<?php

namespace App\Http\Controllers;

use App\Event;
use App\UsersEvents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        return view('home');
//    }

    public function index(Request $request)
    {
        //        DB::select(`*`)
//            ->from(`events`)
//            ->whereRaw(`events.id in`, [], `( SELECT users_events.event_id FROM users_events INNER JOIN events ON users_events.event_id = events.id WHERE users_events.user_id = 1 )`)
//            ->get();
//        $user_id = $request->session()->all();
//        var_dump($user_id);
        $events = new Event();
        $events = $events->whereIn('id', function ($query) {
            $query->select('users_events.event_id')
                ->from(with(new UsersEvents())->getTable())
                ->where('users_events.user_id', '=', Auth::user()->getAuthIdentifier());
        })->orderBy('date_time_start', 'desc')->paginate(5);
//        var_dump($events);
//        $events = $events->where('information', 'like', '%' . $request->session()->get('search') . '%')
//            ->orderBy('date_time_start', 'desc')
//            ->paginate(5);

//        return view('home', compact('events'));
        if ($request->ajax()) {
            return view('home', compact('events'));
        } else {
            return view('events.ajax', compact('events'));
        }
    }
}
