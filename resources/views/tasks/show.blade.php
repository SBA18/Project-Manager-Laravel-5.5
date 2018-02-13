@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-tasks fa-1x"></i> Task : {{ $task->title }}</h1>
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
                            <th>Title</th>
                            <td class="align-left">{{ $task->title }}</td>
                        </tr>
                        <tr>
                            <th>Project</th>
                            <td class="align-left"><a href="{{ route('projects.show', $task->project->id) }}">{{ $task->project->project_name }}</a></td>
                        </tr>
                        <tr>
                            <th>Started at</th>
                            <td>{{ $task->started_at }}</td>
                        </tr>
                        <tr>
                            <th>Ended at</th>
                            <td>{{ $task->ended_at }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $task->status }} </td>
                        </tr>
                        <tr>
                            <th>Progress</th>
                            <td>{{ $task->progress }} %</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $task->price }} $</td>
                        </tr>
                        <tr>
                            <th>Affected to</th>
                            <td>{{ $task->affected_to }} </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $task->task_decription }}</td>
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
                            <td class="align-left">{{ $task->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td class="align-left">{{ $task->created_at }} </td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $task->updated_at }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            <hr>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Task Tickets
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
                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
                <hr>
            </div>
            <div class="col-lg-6">
                <hr>
                <p>
                    <a href="#" type="button" class="btn btn-info"><i class="fa fa-plus-square fa-fw"></i> New Ticket</a> &nbsp;
                    <a href="{{ route('tasks.edit', $task->id) }}" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i> Edit</a> &nbsp;
                    <a href="{{ route('tasks.destroy', $task->id) }}"
                    onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Delete
                    </a>

                    <form id="delete-form" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </p>
                <hr>
            </div>    
    </div>
             
</div>

@endsection