<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IdType;
use App\Destination;
class DropDownController extends Controller
{
    public function dropdown(){
        
        $types = IdType::all();
        $destinations = Destination::all();
        
        return view('pageregister.visitor-register', compact('types', 'destinations'));
    }
}
