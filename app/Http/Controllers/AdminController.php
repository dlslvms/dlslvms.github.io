<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Visitor;
use DB;
use Carbon\Carbon;
use Count;

class AdminController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $users = User::all();
        return view('/dashboard', compact('users'));
    }

    public function dashboard_active()
    {
        $visitors = Visitor::where('status', 0)
            ->where('created_at', '>=', Carbon::today())
            ->paginate(10);

        if(count($visitors) > 0)
        {
            return view('dashboard.active-visitor', ['visitors' => $visitors]);
        }
        return view('dashboard.active-visitor')->withMessage("No Details found!");
    }

    public function dashboard_exited()
    {
        $visitors = Visitor::where('status', 1)
            ->where('created_at', '>=', Carbon::today())
            ->paginate(10);

        if(count($visitors) > 0)
        {
            return view('dashboard.exited-visitor', ['visitors' => $visitors]);
        }
        return view('dashboard.exited-visitor')->withMessage("No Details found!");
    }
    public function dashboard_blocked()
    {
        $visitors = Visitor::where('status', 2)
            ->where('created_at', '>=', Carbon::today())
            ->paginate(10);
        
            if(count($visitors) > 0)
            {
                return view('dashboard.blocked-visitor', ['visitors' => $visitors]);
            }
            return view('dashboard.blocked-visitor')->withMessage("No Details found!");
    }
    public function dashboard_total()
    {
        $visitors = Visitor::whereIn('status', [0,1])
            ->where('created_at', '>=', Carbon::today())
            ->paginate(10);
        
        if(count($visitors) > 0)
        {
            return view('dashboard.total-visitor', ['visitors' => $visitors]);
        }
        return view('dashboard.total-visitor')->withMessage("No Details found!");   
    }

    // public function count(){
    //     $count = Visitor::whereIn('status',  [0, 1, 2, 3])
    //     ->where('created_at', '>=', Carbon::today())
    //     ->count();
    //     return view('/dashboard', compact('users'))->with(['count' => $count]);
        
    //     // $count = Visitor::select('status')
    //     //     ->where('created_at', '>=', Carbon::today())
    //     //     ->paginate(10);
        
    //     // if(count($count) == 0)
    //     // {
    //     //     return view('/dashboard', ['count' => $active_count]);
    //     // }

    //     // else if(count($count) == 1)
    //     // {
    //     //     return view('/dashboard', ['count' => $exited_count]);
    //     // }

    //     // else if(count($count) == 1)
    //     // {
    //     //     return view('/dashboard', ['count' => $blocked_count]);
    //     // }

    //     // else if(count($count) == 1)
    //     // {
    //     //     return view('/dashboard', ['count' => $total_count]);
    //     // }
    //     // return view('dashboard.total-visitor')->withMessage("No Details found!");  
    // }

     // public function count(){
    //     $count = Visitor::select('status')
    //                         ->where('status', '=', 0)
    //                         ->where('status', '=', 1)
    //                         ->where('timein_at', '>=', Carbon::today())
    //                         ->count();
    //                         return view('/dashboard')->with(['count' => $count]);
    // }

}