<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use Image;

use App\Visitor;
use App\IdType;
use App\Destination;

class VisitorRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_types = IdType::all();
        $destinations = Destination::all();
        
        return view('pageregister.visitor-register', compact('id_types', 'destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = Carbon::now();

        $this->validate($request, [
            'picture' => 'required|image|mimes:jpg,jpeg,png,gif',
            'lastname' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'firstname' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'middlename' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'address' => 'required|max:255',
            'contact_number' => 'required|max:11',
            'id_type' => 'required',
            'govid_number' => 'required|unique:visitors,govid_number',
            'destination' => 'required',
            'purpose' => 'required|in:Alumni Visit,Assembly,Audience,Competition,Conference,Guest Speaker,Inquiry,Meeting,Scholarship,School Function,Seminar,Survey Visit,Parent-Teacher Conference,Visit,Others',
        ]);
        // Upload picture
        if ($request->hasFile('picture')) {
            $file = request()->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = $time->format('ydmhi').'_visitor-picture'.'.'.$extension;  
            $file->storeAs('public/uploads/pictures', $filename ); 
            // Image::make($file)->resize(300,300)->save(public_path('/uploads/pictures/' . $filename));
        }
        // dd($request->all());
        $visitors = Visitor::create([
            'picture' => $filename,
            'lastname' => ucwords($request['lastname']), 
            'firstname' => ucwords($request['firstname']),
            'middlename' => ucwords($request['middlename']),
            'address' => ucwords($request['address']),
            'contact_number' => $request['contact_number'],
            'id_type' => $request['id_type'],
            'govid_number' => strtoupper($request['govid_number']),
            'destination' => strtoupper($request['destination']),            
            'purpose' => ucwords($request['purpose']),
            'accesscard_number' => $request['accesscard_number'],
            'timein_at' => Carbon::now(),
        ]);
        return view('pageregister.badge', compact('visitors'))->with('StatusAdd','You have register a new visitor');
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
