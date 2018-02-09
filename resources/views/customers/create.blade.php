@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-1x"></i> New Customer</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="POST" action="{{route('customers.store')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6">
                    <h3>Personal Information</h3>
                    <hr>
                    <div class="form-group">
                        <label>Civility</label>
                        <select class="form-control" name="civility" id="civility" required>
                            <option value="">Select Option</option>
                            <option value="Mr">Mr.</option>
                            <option value="Ms">Ms</option>
                            <option value="Miss">Miss</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label>First name</label>
                        <input class="form-control" type="text" name="firstname" id="firstname" value="{{old('firstname')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input class="form-control" type="text" name="lastname" id="lastname" required>
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <input class="form-control" type="text" name="company" id="company" required>
                    </div>
                    <div class="form-group">
                        <label>Phone number</label>
                        <input class="form-control" type="text" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3>Customer Address</h3>
                    <hr>
                    <div class="form-group">
                        <label>Street</label>
                        <input class="form-control" type="text" name="address_street" id="address_street" placeholder="ex. 123 Wall Street" required>
                    </div>
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input class="form-control" type="text" name="address_postal" id="address_postal" required>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input class="form-control" type="text" name="address_city" id="address_city" required>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input class="form-control" type="text" name="address_country" id="address_country" required>
                    </div>
                </div>

                <div class="col-lg-12">
                    @include('layouts.partials.errors')
                    <button type="submit" class="btn btn-primary">Validate</button>
                    <button type="reset" class="btn btn-danger">Reset Button</button>
                    <hr>
                </div>   
            </div>
        </form>
    </div>
</div>

@endsection