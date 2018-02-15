<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Customer;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::latest()->get();

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::latest()->get();
        return view('tickets.create', compact('customers'));
    }

    public function customerticket($id)
    {
        $customer = Customer::findOrFail($id);
        return view('tickets.customerticket', compact('customer'));
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
            'title' => 'required',
            'customer_id' => 'required',
            'level' => 'required',
            'description' => 'required',
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'customer_id' => request('customer_id'),
            'level' => request('level'),
            'status' => request('status'),
            'description' => request('description'),
        ]);

        return redirect()->route('tickets.show', $ticket);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'customer_id' => 'required',
            'level' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->title = request('title');
        $ticket->customer_id = request('customer_id');
        $ticket->level = request('level');
        $ticket->status = request('status');
        $ticket->description = request('description');

        $ticket->update();

        return redirect()->route('tickets.show', $ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ticket = Ticket::findOrFail($id);

        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
