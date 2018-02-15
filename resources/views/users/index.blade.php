@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Users</h1>
        <a class="btn btn-primary" href="{{ URL('/register') }}"><i class="fa fa-edit fa-fw"></i> Add User</a>
        <hr>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">List of all Users</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Permission</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="odd gradeX">
                            <td><a href="{{ route('single_user', $user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Admin</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
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
