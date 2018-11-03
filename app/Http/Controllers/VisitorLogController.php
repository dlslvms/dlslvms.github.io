<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use Input;

use App\Visitor;
use App\Visitorlog;

class VisitorLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitorlogs = Visitorlog::join('visitors', 'visitorlogs.visitor_id', '=', 'visitors.id')
                            ->select('visitorlogs.*', 'visitors.firstname', 'visitors.lastname')
                            ->orderBy('id', 'asc')
                            // ->latest()
                            ->paginate(10);
        return view('pagerecord.visitorlog', ['visitorlogs' => $visitorlogs]);
    }

    public function search(Request $request)
    {
        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo');

        $visitorlogs = Visitorlog::join('visitors', 'visitorslog.visitor_id', '=', 'visitors.id')
                            ->select('visitorlogs.*', 'visitors.firstname', 'visitors.lastname')
                            ->whereDate('timein_at', '>=', $dateFrom)
                            ->whereDate('timein_at', '<=', $dateTo)
                            ->orderBy('id', 'desc')
                            ->get();               
        if(count($visitorlogs) > 0){
            return view('pagerecord.visitorlogSearch', ['visitorlogs' => $visitorlogs]);
            // dd($userlogs);
        }
            return view('pagerecord.visitorlogSearch')->withMessage("No Records found!");

        return redirect('visitorlog');
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
        $visitorlogs = Visitorlog::join('visitors', 'visitorlogs.visitor_id', '=', 'visitors.id')
                        ->select('visitorlogs.*', 'visitors.firstname', 'visitors.lastname')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
            
        return view('pagerecord.visitorlog', ['visitorlogs' => $visitorlogs]);
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

