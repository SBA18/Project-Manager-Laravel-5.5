@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-tasks fa-1x"></i> User : {{ $user->name }}</h1>
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
                          <th>Name</th>
                          <td class="align-left">{{ $user->name }}</td>
                      </tr>
                      <tr>
                          <th>Username</th>
                          <td class="align-left">{{ $user->username }}</td>
                      </tr>
                      <tr>
                          <th>Email</th>
                          <td>{{ $user->email }}</td>
                      </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <div class="col-lg-6">
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores dolore corporis maxime nesciunt, omnis vero, illo veniam consequuntur quam ea vel voluptas est reprehenderit deserunt nihil possimus deleniti assumenda id.</p>
        </div>
        <div class="col-lg-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque veritatis, nam amet ut quae sed facere saepe recusandae modi voluptatem maxime, dolorum nemo quia similique perspiciatis ex! Ratione numquam, dolore.</p>
        </div>
    </div> 
    <div class="col-lg-12">
        <div class="col-lg-6">
            <hr>
            <a href="{{ route('users') }}" class="btn btn-primary">Back</a>
            <hr>
        </div>
        <div class="col-lg-6">
            <hr>
            <p>
                <a href="" type="button" class="btn btn-warning"><i class="fa fa-edit fa-fw"></i> Edit</a> &nbsp;
                <a href=""
                onclick="event.preventDefault();
                document.getElementById('delete-form').submit();" type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Delete
                </a>

                <form id="delete-form" action="" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            </p>
            <hr>
        </div>
    </div>
</div>

@endsection
