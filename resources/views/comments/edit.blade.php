@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-1x"></i> Edit Comments</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="POST" action="{{ route('comments.update', $comment->id) }}">
            <div class="form-group">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <label>Leave a comment</label>
                <textarea class="form-control" rows="3" name="body" id="body" required>{{ $comment->body }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <hr>
        </form>
    </div>
</div>

@endsection