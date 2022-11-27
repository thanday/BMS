<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Channels;
use App\Models\Events;
use App\Models\User;
use App\Notifications\UserAsignNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $user;
    public function notify()
    {
        if(auth()->user()){
            $user = User::first();

            //  auth()->user()->notify(new UserAsignNotification($user));
              Notification::send(auth()->user(), new UserAsignNotification($user));
        }
       
    }

    public function markasread($id)
    {
        if($id){
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return back();
    }

    public function __invoke(Request $request)
    {
       // $users = User::latest()->paginate(10);
        $users = User::where('role', 'technician')->get()->count();
        //   $events = Events::latest()->paginate();
        $events = Events::where('event_date', '>=', date('Y-m-d'))->whereNull('live_end_time')
            ->orderBy('event_date')
            ->paginate(15);
        $events_counts = Events::all()->count();
        $events_live = Events::where('type', 'Live')->count();
        $events_rec = Events::where('type', 'Recording')->count();
        $events_link = Events::where('type', 'Live Link only')->count();
        $channels_counts = Channels::all()->count();
        $local_channel = Channels::where('title', 'Local Channel')->count();
        $psm_channel = Channels::where('title', 'PSM Channel')->count();
        $events_authusers = Events::all()->where('techl_id', Auth::user()->id)->whereNull('live_end_time');

        return view('eng.dashboard', [
            'events' => $events,
            'users' => $users,
            'events_counts' => $events_counts,
            'events_live' => $events_live,
            'events_rec' => $events_rec,
            'events_link' => $events_link,
            'channels_counts' => $channels_counts,
            'local_channel' => $local_channel,
            'psm_channel' => $psm_channel,
            'events_authusers' => $events_authusers,
        ]);
    }
}
