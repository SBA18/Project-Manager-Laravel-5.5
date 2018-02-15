@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-support fa-1x"></i> Tickets</h1>
            <a class="btn btn-primary" href="{{ route('tickets.create') }}"><i class="fa fa-plus-square fa-fw"></i> New Ticket</a>
        <hr>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of all Tickets
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Customer</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Created By</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($tickets as $ticket)
                        <tr class="odd gradeX">
                            <td><a href="{{ route('tickets.show', $ticket->id) }}">{{ str_limit($ticket->title, 50) }}</a></td>
                            <td><a href="{{ route('customers.show', $ticket->customer->id) }}">{{ $ticket->customer->firstname }} {{ $ticket->customer->firstname }}</a></td>
                            <td>{{ $ticket->level }}</td>
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->created_at->toDateString() }}</td>
                            <td><a href="{{ route('single_user', $ticket->user->id) }}">{{ $ticket->user->name }}</a></td>
                            <td>{{ str_limit($ticket->description, 90) }}</td>
                            
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