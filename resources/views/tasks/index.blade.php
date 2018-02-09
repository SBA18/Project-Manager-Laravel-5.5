@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-tasks fa-1x"></i> Tasks</h1> 
        <a class="btn btn-primary" href="{{ route('tasks.create') }}"><i class="fa fa-plus-square fa-fw"></i> New Task</a>
        <hr>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of all tasks
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Project name</th>
                            <th>Started at</th>
                            <th>Ended at</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th>Price</th>
                            <th>Affected to</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($tasks as $task)
                        <tr class="odd gradeX">
                            <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
                            <td>{{ $task->project->project_name }}</td>
                            <td>{{ $task->started_at }}</td>
                            <td>{{ $task->ended_at }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->progress }}%</td>
                            <td>{{ $task->price }}$</td>
                            <td>{{ $task->affected_to }}</td>
                            <td>{{ str_limit($task->task_decription, 50) }}</td>
                        </tr>
                        @endforeach
                         
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->



@endsection