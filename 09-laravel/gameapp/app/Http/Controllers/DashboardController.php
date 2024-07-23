<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $user = User::where('id', auth()->id())->first();   
        return view('dashboard')->with('user', $user);
        //
    }
}
