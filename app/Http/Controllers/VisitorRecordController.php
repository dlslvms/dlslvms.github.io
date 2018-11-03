<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Hash;
use Input;

use App\Visitor;
class VisitorRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::join('destinations', 'visitors.destination', '=', 'destinations.id')
                            ->join('id_types', 'visitors.id_type', '=', 'id_types.id')
                            ->select('visitors.*', 'destinations.destination', 'id_types.id_type')
                            ->where('status', 0)
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        return view('pagerecord.visitor-record', ['visitors' => $visitors]);
    }

    public function search(Request $request)
    {
        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo');

        $visitors = Visitor::join('destinations', 'visitors.destination', '=', 'destinations.id')
                            ->join('id_types', 'visitors.id_type', '=', 'id_types.id')
                            ->select('visitors.*', 'visitors.firstname', 'visitors.lastname', 'visitors.accesscard_number')
                            ->whereDate('created_at', '>=', $dateFrom)
                            ->whereDate('created_at', '<=', $dateTo)
                            ->orderBy('id', 'desc')
                            ->get();               
        if(count($visitors) > 0){
            return view('pagerecord.visitor-recordSearch', ['visitors' => $visitors]);
        }
            return view('pagerecord.visitor-recordSearch')->withMessage("No Records found!");

        return redirect('visitor-record');
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
        $visitors = Visitor::join('destinations', 'visitors.destination', '=', 'destinations.id')
                            ->join('id_types', 'visitors.id_type', '=', 'id_types.id')
                            ->select('visitors.*', 'destinations.destination', 'id_types.id_type')
                            ->where('status', 0)
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        return view('pagerecord.visitor-record', ['visitors' => $visitors]);
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
