@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
        <h1 class="page-header"><i class="fa fa-user fa-1x"></i> Customer : {{ $customer->firstname }}  {{ $customer->lastname }}</h1>
        </div>
        <div class="col-lg-6">
            <h1 class="page-header"><i class="fa fa-gears  fa-1x"></i> Related Objects </h1>   
        </div>
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
                            <th>Civility : </th>
                            <td class="align-left">{{ $customer->civility }}</td>
                        </tr>
                        <tr>
                            <th>First / Last name : </th>
                            <td class="align-left">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Company : </th>
                            <td>{{ $customer->company }}</td>
                        </tr>
                        <tr>
                            <th>Phone : </th>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email : </th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th>Street : </th>
                            <td>{{ $customer->address_street }}</td>
                        </tr>
                        <tr>
                            <th>Postal code : </th>
                            <td>{{ $customer->address_postal }}</td>
                        </tr>
                        <tr>
                            <th>City : </th>
                            <td>{{ $customer->address_city }}</td>
                        </tr>
                        <tr>
                            <th>Counttry : </th>
                            <td>{{ $customer->address_country }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
			<hr>
            <div class="table-responsive">
                <table class="table table-striped">
         
                    <tbody>
                    	<tr>
                            <th>Created By : </th>
                            <td class="align-left">{{ $customer->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Created At : </th>
                            <td class="align-left">{{ $customer->created_at }} </td>
                        </tr>
                        <tr>
                            <th>Updated At : </th>
                            <td>{{ $customer->updated_at }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->


        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Customer projects
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            @if($customer->projects->count() >= 1)
                            <thead>
                                <tr>
                                    <th>Project name</th>
                                    <th>Started at</th>
                                    <th>Ended at</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customer->projects as $custproject)
                                <tr>
                                    <td><a href="{{ route('projects.show', $custproject->id) }}">{{ $custproject->project_name }}</a></td>
                                    <td>{{ $custproject->started_at }}</td>
                                    <td>{{ $custproject->ended_at }}</td>
                                    <td>{{ $custproject->project_status }}</td>
                                </tr>
                                @endforeach
                              @else
                                <div class="alert alert-warning align-center" role="alert">
                                    No project created yet !
                                </div>
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Customer Tickets
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
         	<a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
         	<hr>
    	</div>
    	<div class="col-lg-6">
    		<hr>
    		<p>
	            <a href="{{ route('customerproject', $customer->id) }}" type="button" class="btn btn-primary"><i class="fa fa-plus-square fa-fw"></i> New project</a> &nbsp;
	            <a href="#" type="button" class="btn btn-info"><i class="fa fa-plus-square fa-fw"></i> New Ticket</a> &nbsp;
	            <a href="{{ route('customers.edit', $customer->id) }}" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i> Edit</a> &nbsp;
	            @if($projects >= 1)
                    <a href="#" type="button" class="btn btn-danger disabled"><i class="fa fa-trash-o fa-fw"></i> Delete</a>
                @else
                    <a href="{{ route('customers.destroy', $customer->id) }}"
                    onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Delete
                    </a>

                <form id="delete-form" action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
                    
                
                @endif

	        </p>
	        <hr>
    	</div>            
    </div>
    <div class="col-lg-12">
    	<div class="col-lg-6">
    		<form role="form">
        		<div class="form-group">
        			{{ csrf_field() }}
                    <label>Comment</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Add Comment</button>
        	</form>
    	</div>
    	<div class="col-lg-6">
    		<p>Comments</p>
    	</div>
    </div>  
</div>

@endsection