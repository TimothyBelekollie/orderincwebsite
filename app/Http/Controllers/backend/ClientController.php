<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    //
    // Display a listing of the resource
    public function index()
    {
        $clients = Client::all();
        return view('backend.clients.index', compact('clients'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('backend.clients.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'rep_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:15',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('backend.clients.index')->with('success', 'Client created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('backend.clients.show', compact('client'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('backend.clients.edit', compact('client'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'rep_name' => 'required|string|max:255',
            'email' => "required|email|unique:clients,email,{$id}",
            'phone' => 'required|string|max:15',
            'company' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $client->update($request->all());

        return redirect()->route('backend.clients.index')->with('success', 'Client updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('backend.clients.index')->with('success', 'Client deleted successfully.');
    }
}
