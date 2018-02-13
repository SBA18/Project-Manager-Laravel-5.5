<?php

namespace App\Http\Controllers;

use App\Project;
use App\Customer;
use App\Task;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->get();
        $customers_numbers = Customer::get()->count();
        return view('projects.index', compact('projects', 'customers_numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::latest()->get();
        return view('projects.create', compact('customers'));
    }

    public function customerproject($id)
    {
        $customer = Customer::find($id);

        return view('projects.customerproject', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers_numbers = Customer::get()->count();
        if ($customers_numbers != 0) {
            $this->validate(request(), [
            'customer_id' => 'required',
            'project_name' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'project_status' => 'required',
            'budget' => 'required',
            'project_description' => 'required'
        ]);

        $project = Project::create([
            'customer_id' => request('customer_id'),
            'user_id' => auth()->id(),
            'project_name' => request('project_name'),
            'started_at' => request('started_at'),
            'ended_at' => request('ended_at'),
            'project_status' => request('project_status'),
            'budget' => request('budget'),
            'project_description' => request('project_description'),
        ]);

        return redirect()->route('projects.show', $project);
        }
        else{
            return redirect()->back()->with('message', 'You have to create a customer first before creating a project');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $tasks = Task::get()->count();
        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $this->validate(request(), [
            'project_name' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'project_status' => 'required',
            'budget' => 'required',
            'project_description' => 'required'
        ]);


        $project = Project::findOrFail($id);

        $project->project_name = request('project_name');
        $project->started_at = request('started_at');
        $project->ended_at = request('ended_at');
        $project->project_status = request('project_status');
        $project->budget = request('budget');
        $project->project_description = request('project_description');

        $project->update();

        return redirect()->route('projects.show', $project);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $tasks = Task::get()->count();

        if ($tasks >= 1) {     
            return redirect()->back();
        }
        else{
            $project->delete();
            return redirect()->route('projects.index');
        } 
    }
}
