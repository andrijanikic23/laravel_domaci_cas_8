<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomepageModel;

class HomepageController extends Controller
{
    public function index()
    {
        $current_time = date("h:i:s");
        $current_hour = date("h");
        $products = HomepageModel::orderBy('id', 'desc')->take(6)->get();
        return view("welcome", compact('current_time', 'current_hour', 'products'));    
       
    }

}
