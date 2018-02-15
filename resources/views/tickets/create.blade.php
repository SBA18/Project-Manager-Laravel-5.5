@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-comments fa-1x"></i> New Ticket</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="POST" action="{{route('tickets.store')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label>Customer</label>
                        <select class="form-control" name="customer_id" id="customer_id" required>
                            <option>Select Customer</option>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->firstname }} {{ $customer->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" id="level" required>
                            <option class="selected" value="low">Low</option>
                            <option value="normal">Normal</option>
                            <option value="critical">Critical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option class="selected" value="new">new</option>
                            <option value="opened">opened</option>
                            <option value="closed">closed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="4" name="description" id="description"></textarea>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    
                </div>

                <div class="col-lg-12">
                    @include('layouts.partials.errors')
                    <button type="submit" class="btn btn-primary">Validate</button>
                    <a href="{{ route('tickets.index') }}" class="btn btn-danger">Cancel</a>
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