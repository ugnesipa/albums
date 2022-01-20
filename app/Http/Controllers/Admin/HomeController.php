<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     // authorizes the user logged in as admin as an admin
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //returns the admin home view
    public function index()
    {
        return view('admin.home');
    }
}
