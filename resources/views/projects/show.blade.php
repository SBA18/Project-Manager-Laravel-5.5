@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bar-chart-o fa-1x"></i> Project : {{ $project->project_name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <div class="table-responsive">
                <table class="table table-striped">
         
                    <tbody>
                    	<tr>
                            <th>Project name</th>
                            <td class="align-left">{{ $project->project_name }}</td>
                        </tr>
                        <tr>
                            <th>Customer</th>
                            <td class="align-left"><a href="{{ route('customers.show', $project->customer->id) }}">{{ $project->customer->firstname }} {{ $project->customer->lastname }}</a></td>
                        </tr>
                        <tr>
                            <th>Started At</th>
                            <td>{{ $project->started_at }}</td>
                        </tr>
                        <tr>
                            <th>Ended At</th>
                            <td>{{ $project->ended_at }}</td>
                        </tr>
                        <tr>
                            <th>Budget</th>
                            <td>{{ $project->budget }} $</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $project->project_status }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $project->project_description }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
    		
            


        </div>
        <div class="col-lg-6">
            <div class="table-responsive">
                <table class="table table-striped">
         
                    <tbody>
                        <tr>
                            <th>Created By</th>
                            <td class="align-left">{{ $project->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td class="align-left">{{ $project->created_at }} </td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $project->updated_at }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            <hr>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Project Tickets
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>

            
        </div>   

    </div>
    <div class="col-lg-12">
            <div class="col-lg-6">
                <hr>
                <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
                <hr>
            </div>
            <div class="col-lg-6">
                <hr>
                <p>
                    <a href="{{ route('projecttask', $project->id) }}" type="button" class="btn btn-success"><i class="fa fa-plus-square fa-fw"></i> New Task</a> &nbsp;
                    <a href="#" type="button" class="btn btn-info"><i class="fa fa-plus-square fa-fw"></i> New Ticket</a> &nbsp;
                    <a href="{{ route('projects.edit', $project->id) }}" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i> Edit</a> &nbsp;
                    
                    @if($tasks >= 1)

                    <a href="#" type="button" class="btn btn-danger disabled"><i class="fa fa-trash-o fa-fw"></i> Delete</a>
                    @else
                    
                    <a href="{{ route('projects.destroy', $project->id) }}"
                    onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Delete
                    </a>

                    <form id="delete-form" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>

                    @endif
                </p>
                <hr>
            </div>    
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Project Tasks
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Started at</th>
                            <th>Ended at</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th>Affected to</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->tasks as $task)
                        <tr class="odd gradeX">
                            <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
                            <td>{{ $task->started_at }}</td>
                            <td>{{ $task->ended_at }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->progress }}%</td>
                            <td>{{ $task->affected_to }}</td>
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

@endsection