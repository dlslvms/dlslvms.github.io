<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use DB;
use Hash;

class VisitorMonitorController extends Controller
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
                            ->where('created_at', '>=', Carbon::today())
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        if(count($visitors) > 0)
        {
            return view('pagevisitor-monitor.visitor-monitor',['visitors' => $visitors]);
                                
        }
        else
        {
            return view('pagevisitor-monitor.visitor-monitor')->withMessage('No Records found!');
        }
        return redirect('visitor-monitor');
    }

    public function search(Request $request)
    {
        $search = Input::get('search');
        if($search != ''){
            $visitors = Visitor::where('status', 0)
                        ->where(function($query){
                            $search = Input::get('search');
                            $query->where('firstname', 'LIKE', '%'.$search.'%')
                                        ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                                        ->orWhere('destination', 'LIKE', '%'.$search.'%')
                                        ->orWhere('purpose', 'LIKE', '%'.$search.'%')
                                        ->orWhere('accesscard_number', 'LIKE', '%'.$search.'%');
                        })
                        ->where('created_at', '>=', Carbon::today())
                        ->orderBy('id', 'desc')
                        ->paginate(10);
            $visitors->appends([
                'search' => Input::get('search'),
            ]);

            if(count($visitors) > 0)
            {
                return view('pagevisitor-monitor.visitor-monitor',['visitors' => $visitors]);
                
            }
            else
            {
                return view('pagevisitor-monitor.visitor-monitor')->withMessage('No Records found!');
            }
        }
        return redirect('visitor-monitor');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitors = Visitor::find($id);
        return view('pagevisitor-monitor.visitor-profile', compact('visitors'));
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
