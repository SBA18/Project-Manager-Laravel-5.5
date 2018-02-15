@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-comments fa-1x"></i> Comments</h1>    
        <hr>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of all Comments
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Comment</th>
                            <th>Customer</th>
                            <th>Created by</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($comments as $comment)
                        <tr class="odd gradeX">
                             <td>{{ str_limit($comment->body, 100) }}</td>
                            <td><a href="{{ route('customers.show', $comment->customer->id) }}">{{ $comment->customer->firstname }} {{ $comment->customer->lastname }}</a></td>
                            <td><a href="{{ route('single_user', $comment->user->id) }}">{{ $comment->user->name }}</a></td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning stat-item">
                                    <i class="fa fa-edit icon"></i>
                                </a>

                                <a href="{{ route('comments.destroy', $comment->id) }}"
                                onclick="event.preventDefault();
                                document.getElementById('delete-form').submit();" type="button" class="btn btn-danger stat-item"><i class="fa fa-trash-o icon"></i>
                                </a>

                                <form id="delete-form" action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form> 
                            </td>
                           
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