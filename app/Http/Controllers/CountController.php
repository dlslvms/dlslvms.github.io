<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use DB;
use Carbon\Carbon;
use Count;

class CountController extends Controller
{
    // public function active_count()
    // {
    //     // $active_count = Visitor::where('status',  0)
    //     // ->where('created_at', '>=', Carbon::today())
    //     // ->count();
    //     // return view('/dashboard')->with(['count' => $active_count]);

    //     $active_count = Visitor::where('status', 0)
    //     ->where('timein_at', '>=', Carbon::today())
    //     ->count();
    //     return view('/dashboard', compact('active_count'));

    // }
    // public function exited_count()
    // {
    //     // $count = Visitor::where('status', 1)
    //     // ->where('created_at', '>=', Carbon::today())
    //     // ->count();
    //     // return view('/dashboard')->with(['count' => $count]);

    //     $exited_count = Visitor::where('status', 1)
    //     ->where('timein_at', '>=', Carbon::today())
    //     ->count();
    //     return view('/dashboard', compact('exited_count'));

    // }
    // public function blocked_count(){
    //     // $count = Visitor::where('status', 2)
    //     // ->where('created_at', '>=', Carbon::today())
    //     // ->count();
    //     // return view('/dashboard')->with(['count' => $count]);

    //     $blocked_count = Visitor::where('status', 2)
    //     ->where('timein_at', '>=', Carbon::today())
    //     ->count();
    //     return view('/dashboard', compact('blocked_count'));

    // }
    // public function total_count(){
    //     // $count = Visitor::where('status', [1,2])
    //     // ->where('created_at', '>=', Carbon::today())
    //     // ->count();
    //     // return view('/dashboard')->with(['count' => $count]);

    //     $total_count = Visitor::where('status', [0])
    //     ->where('timein_at', '>=', Carbon::today())
    //     ->count();
    //     return view('/dashboard', compact('total_count'));
    // }

    public function active_count()
    {
        $active_count = Visitor::where('status',  0)
        ->where('created_at', '>=', Carbon::today())
        ->count();
        return view('/dashboard', compact('users'))->with(['active_count' => $active_count]);
    }
    public function exited_count()
    {
        $exited_count = Visitor::where('status',  1)
        ->where('created_at', '>=', Carbon::today())
        ->count();
        return view('/dashboard', compact('users'))->with(['exited_count' => $exited_count]);
    }
    public function blocked_count(){
        $blocked_count = Visitor::where('status',  2)
        ->where('created_at', '>=', Carbon::today())
        ->count();
        return view('/dashboard', compact('users'))->with(['blocked_count' => $blocked_count]);
    }
    public function total_count(){
        $total_count = Visitor::where('status',  0)
        ->where('status', 1)
        ->where('created_at', '>=', Carbon::today())
        ->count();
        return view('/dashboard', compact('users'))->with(['total_count' => $total_count]);
    }



    // public function count(){
    //     $count = Visitor::select('status')
    //                         ->where('status', '=', 0)
    //                         ->where('status', '=', 1)
    //                         ->where('timein_at', '>=', Carbon::today())
    //                         ->count();
    //                         return view('/dashboard')->with(['count' => $count]);
    // }
    // public function count(){
    //     $count = Visitor::where('status', '=', 0)
    //         ->where('timein_at', '>=', Carbon::today())
    //         ->count();
    //         return view('/dashboard')->with(['count' => $count]);
    // }
}
