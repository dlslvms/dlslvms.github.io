<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\Userlog;
use DB;
use Auth;

class LogoutSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        DB::table('userlogs')
        ->where('user_id', Auth::id())
        ->orderBy('id','desc')
        ->limit(1)
        ->update(array(
                'logout_at'    => Carbon::now()
            ));
    }
}
