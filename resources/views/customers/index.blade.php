@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-user fa-1x"></i> Customers</h1> 
            <a class="btn btn-primary" href="{{ route('customers.create') }}"><i class="fa fa-plus-square fa-fw"></i> New Customers</a>
            <hr>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of all customers
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr class="odd gradeX">
                                <td><a href="{{ route('customers.show', $customer->id) }}">{{ $customer->firstname }}</a></td>
                                <td>{{ $customer->lastname }}</td>
                                <td>{{ $customer->company }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->address_city }}</td>
                                <td>{{ $customer->created_at->toDateString() }}</td>
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