<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use Input;

use App\User;
use App\Userlog;

class UserLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userlogs = Userlog::join('users', 'userlogs.user_id', '=', 'users.id')
                            ->select('userlogs.*', 'users.firstname', 'users.lastname', 'users.user_number', 'users.user_type')
                            ->orderBy('id', 'desc')
                            // ->latest()
                            ->paginate(10);
        return view('pagerecord.userlog', ['userlogs' => $userlogs]);
    }

    public function search(Request $request)
    {
        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo');

        $userlogs = Userlog::join('users', 'userlogs.user_id', '=', 'users.id')
                            ->select('userlogs.*', 'users.firstname', 'users.lastname', 'users.user_number', 'users.user_type')
                            ->whereDate('login_at', '>=', $dateFrom)
                            ->whereDate('login_at', '<=', $dateTo)
                            ->orderBy('id', 'desc')
                            ->get();               
        if(count($userlogs) > 0){
            return view('pagerecord.userlogSearch', ['userlogs' => $userlogs]);
            // dd($userlogs);
        }
            return view('pagerecord.userlogSearch')->withMessage("No Records found!");

        return redirect('userlog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userlogs = Userlog::join('users', 'userlogs.user_id', '=', 'users.id')
                        ->select('userlogs.*', 'users.firstname', 'users.lastname', 'users.user_number', 'users.user_type')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
            
        return view('pagerecord.userlog', ['userlogs' => $userlogs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
