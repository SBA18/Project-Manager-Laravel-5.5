@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-tickets fa-1x"></i> Ticket : {{ str_limit($ticket->title, 80) }}</h1>
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
                            <td class="align-left">{{ $ticket->title }}</td>
                        </tr>
                        <tr>
                            <th>Customer</th>
                            <td><a href="{{ route('customers.show', $ticket->customer->id) }}">{{ $ticket->customer->firstname }} {{ $ticket->customer->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Level</th>
                            <td>{{ $ticket->level }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $ticket->status }} </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $ticket->description }} %</td>
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
                            <td class="align-left">{{ $ticket->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td class="align-left">{{ $ticket->created_at }} </td>
                        </tr>
                        
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $ticket->updated_at }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            </div>
        </div>   
    </div>
    <div class="col-lg-12">
            <div class="col-lg-6">
                <hr>
                <a href="{{ route('tickets.index') }}" class="btn btn-primary">Back</a>
                <hr>
            </div>
            <div class="col-lg-6">
                <hr>
                <p>
                    <a href="{{ route('tickets.edit', $ticket->id) }}" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i> Edit</a> &nbsp;
                    <a href="{{ route('tickets.destroy', $ticket->id) }}"
                    onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Delete
                    </a>

                    <form id="delete-form" action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </p>
                <hr>
            </div>    
    </div>
             
</div>

@endsection