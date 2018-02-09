<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $customers = Customer::get()->count();
        $projects = Project::get()->count();
        $tasks = DB::table('tasks')->where('status' , 'active')->count();
        return view('home', compact('customers', 'projects', 'tasks'));
    }
}
