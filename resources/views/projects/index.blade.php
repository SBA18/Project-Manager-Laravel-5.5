@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-bar-chart-o fa-1x"></i> Projects</h1> 
        <a class="btn btn-primary" href="{{ route('projects.create') }}"><i class="fa fa-plus-square fa-fw"></i> New Project</a>
        <hr>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of all projects
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Project name</th>
                            <th>Customer</th>
                            <th>Started at</th>
                            <th>Ended at</th>
                            <th>Budget USD</th>
                            <th>Status</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr class="odd gradeX">
                            <td><a href="{{ route('projects.show', $project->id) }}">{{ $project->project_name }}</a></td>
                            <td><a href="{{ route('customers.show', $project->customer->id) }}">{{$project->customer->firstname}}  {{$project->customer->lastname}}</a></td>
                            <td>{{ $project->started_at }}</td>
                            <td>{{ $project->ended_at }}</td>
                            <td>{{ $project->budget }}</td>
                            <td>{{ $project->project_status }}</td>
                            <td>{{ str_limit($project->project_description, 50) }}</td> 
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