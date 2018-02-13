<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\User;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        $projects_numbers = Project::get()->count();
        return view('tasks.index', compact('tasks', 'projects_numbers'));
    }

    public function projecttask($id)
    {
        $users = User::all();
        $project = Project::find($id);

        return view('tasks.projecttask', compact('project', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $projects = Project::latest()->get();
        return view('tasks.create', compact('projects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projects_numbers = Project::get()->count();

        if ($projects_numbers != 0) {
            $this->validate(request(), [
            'project_id' => 'required',
            'title' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'status' => 'required',
            'progress' => 'required',
            'price' => 'required',
            'affected_to' => 'required',
            'task_decription' => 'required',
        ]);


        $task = Task::create([
            'project_id' => request('project_id'),
            'user_id' => auth()->id(),
            'title' => request('title'),
            'started_at' => request('started_at'),
            'ended_at' => request('ended_at'),
            'status' => request('status'),
            'progress' => request('progress'),
            'price' => request('price'),
            'affected_to' => request('affected_to'),
            'task_decription' => request('task_decription'),
        ]);

        return redirect()->route('tasks.show', $task);
        }
        else{
             return redirect()->back()->with('message', 'You have to create a project first before creating a task');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $this->validate(request(), [
            'title' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'status' => 'required',
            'progress' => 'required',
            'price' => 'required',
            'affected_to' => 'required',
            'task_decription' => 'required',
        ]);

        $task = Task::findOrFail($id);

        $task->title = request('title');
        $task->started_at = request('started_at');
        $task->ended_at = request('ended_at');
        $task->status = request('status');
        $task->progress = request('progress');
        $task->price = request('price');
        $task->affected_to = request('affected_to');
        $task->task_decription = request('task_decription');

        $task->update();

        return redirect()->route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('tasks.index');
       
    }
}
