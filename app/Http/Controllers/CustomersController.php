<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use App\Project;
use App\Comment;

class CustomersController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        // dd($customers);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'civility' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:customers',
            'address_street' => 'required',
            'address_city' => 'required',
            'address_postal' => 'required',
            'address_country' => 'required',
        ]);
        // dd($request->all());
        $customer = Customer::create([
            'civility' => request('civility'),
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'company' => request('company'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address_street' => request('address_street'),
            'address_city' => request('address_city'),
            'address_postal' => request('address_postal'),
            'address_country' => request('address_country'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('customers.show', $customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        $projects = Project::get()->count();
        $comments = Comment::get()->count();

        return view('customers.show', compact('customer', 'projects', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address_street' => 'required',
            'address_city' => 'required',
            'address_postal' => 'required',
            'address_country' => 'required',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->firstname = request('firstname');
        $customer->lastname = request('lastname');
        $customer->company = request('company');
        $customer->phone = request('phone');
        $customer->email = request('email');
        $customer->address_street = request('address_street');
        $customer->address_city = request('address_city');
        $customer->address_postal = request('address_postal');
        $customer->address_country = request('address_country');

        $customer->update();

        return redirect()->route('customers.show', $customer);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $projects = Project::get()->count();

        if ($projects >= 1) {     
            return redirect()->back();
        }
        else{
            $customer->delete();
            return redirect()->route('customers.index');
        } 
    }
}
