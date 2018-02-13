@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-tasks fa-1x"></i> Edit Task</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="POST" action="{{route('tasks.update', $task->id)}}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $task->title }}" required>
                    </div>
                    <div class="form-group">
                        <label>Start date</label>
                        <input class="form-control" type="text" name="started_at" id="datepicker" value="{{ $task->started_at }}" required>
                    </div>
                    <div class="form-group">
                        <label>End date</label>
                        <input class="form-control" type="text" name="ended_at" id="datepicker2" value="{{ $task->ended_at }}" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="text" name="price" id="price" value="{{ $task->price }}" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="{{ $task->status }}">Cuurent status : {{ $task->status }}</option>
                            <option value="hold">Hold</option>
                            <option value="active">Active</option>
                            <option value="In progress">In progress</option>
                            <option value="finished">Finished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Progession</label>
                        <select class="form-control" name="progress" id="progress">
                            <option value="{{ $task->progress }}">Cuurent progress : {{ $task->progress }}%</option>
                            <option value="0">0%</option>
                            <option value="10">10%</option>
                            <option value="20">20%</option>
                            <option value="40">40%</option>
                            <option value="60">60%</option>
                            <option value="80">80%</option>
                            <option value="100">100%</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Project</label>
                        <select class="form-control" name="affected_to" id="affected_to" required>
                            @foreach($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="4" name="task_decription" id="task_decription" required>{{ $task->task_decription }}</textarea>
                    </div>
                    
                </div>

                <div class="col-lg-12">
                    @include('layouts.partials.errors')
                    <button type="submit" class="btn btn-primary">Validate</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancel</a>
                    <hr>
                </div>   
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
    <!-- datepicker JS -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
      $(function() {
        $( "#datepicker" ).datepicker();
      });
      $(function() {
        $( "#datepicker2" ).datepicker();
      });
    </script>
    <!-- End datepicker JS -->
@endsection