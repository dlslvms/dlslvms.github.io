<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Hash;

use App\User;

class UserManagementController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function addUserShowForm()
    {
        return view('pageuser-management.add');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('status', 0)->paginate(10);
        return view('pageuser-management.user-management', compact('users'));
        
    }

    public function search(Request $request)
    {
        // dd(Input::get('search'));

        $search = Input::get('search');
        if($search != ''){
            // $users = User::where('firstname', 'LIKE', '%'.$search.'%')
            //                 ->orWhere('lastname', 'LIKE', '%'.$search.'%')
            //                 // ->orWhere('user_number', 'LIKE', '%'.$search.'%')
            //                 ->orWhere('user_type', 'LIKE', '%'.$search.'%')
            //                 ->where('status', 0)
            //                 ->paginate(10);
            $users = User::where('status', 0)
                        ->where(function($query){
                            $search = Input::get('search');
                            $query->where('firstname', 'LIKE', '%'.$search.'%')
                                        ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                                        ->orWhere('user_number', 'LIKE', '%'.$search.'%')
                                        ->orWhere('user_type', 'LIKE', '%'.$search.'%');
                        })
                        ->paginate(10);
            $users->appends([
                'search' => Input::get('search'),
            ]);

            if(count($users) > 0){
                return view('pageuser-management.user-management',['users' => $users]);
                // dd($users);
            }else{
                return view('pageuser-management.user-management')->withMessage('No Records found!');
                // return redirect('/user-management')->with('SearchMessage','No Details Found!');
            }
        }
        return redirect('user-management');
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
        // dd($request->all());
        $this->validate($request, [
            // 'picture' => 'required|image|mimes:jpg,jpeg,png,gif',
            'firstname' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'middlename' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'lastname' => 'required|regex:/^[a-zA-Z ]+$/|max:50',
            'address' => 'required|max:255',
            'birthday' => 'date_format:Y-m-d',
            'contact_number' => 'required|max:11',
            'user_number' => 'required|unique:users,user_number|max:10',
            'user_type' => 'required|in:admin,user',
            'password' => 'required|confirmed|min:6',
        ]);
        User::create([
            'firstname' => ucwords($request['firstname']),
            'middlename' => ucwords($request['middlename']), 
            'lastname' => ucwords($request['lastname']), 
            'address' => ucwords($request['address']), 
            'birthday' => $request['birthday'], 
            'contact_number' => $request['contact_number'],
            'user_number' => $request['user_number'],
            'user_type' => $request['user_type'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect('/user-management')->with('StatusAdd','You have add a new user');
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
        $users = User::find($id);
        return view('pageuser-management.edit', compact('users'));
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
        // dd($request->all());

        //Find the specific user id
        $user = User::findOrFail($id);
        $constraints = [
            'firstname' => 'required',
            'lastname'=> 'required',
            'user_number' => 'required',
            ];
        //get the input
        $input = [
            'firstname' => ucwords($request['firstname']),
            'lastname' => ucwords($request['lastname']),
            'user_number' => $request['user_number'],
            'user_type' => $request['user_type'],
        ];

        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);

            if (Hash::check($request->get('password'), $user->password)) {
                // The new password matches the old password
                return back()->with("ErrorEdit","New Password cannot be same as your current password. Please choose a different password.");
            }
        }
        //Validates the input
        $this->validate($request, $constraints);

        //Update the user info
        User::where('id', $id)
            ->update($input);
        
        return redirect('user-management')->with("StatusEdit","User information updated successfully!");
    }

    public function status(Request $request)
    {
        // dd($request->status_value);
        $statusid = User::findOrFail($request->status_id);
        $statusid->status = $request->status_value;
        $statusid->save();
        // $statusid->update($request->all());
        return redirect('user-management')->with('StatusDeactivate','You have deactivated a user');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteid = User::findOrFail($request->delete_id);
        $deleteid->delete();
        return back()->with('StatusDelete','You have deleted a user');
        
    }
}
