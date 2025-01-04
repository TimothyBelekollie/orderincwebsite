<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    // Display a listing of the resource
    public function index()
    {
        $projects = Project::all();
        return view('backend.projects.index', compact('projects'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('projects.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:projects,slug',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:pending,ongoing,completed,cancelled',
            'budget' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id',
        ]);

        Project::create($request->all());

        return redirect()->route('backend.projects.index')->with('success', 'Project created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.projects.show', compact('project'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.projects.edit', compact('project'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => "required|string|unique:projects,slug,{$id}",
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:pending,ongoing,completed,cancelled',
            'budget' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id',
        ]);

        $project->update($request->all());

        return redirect()->route('backend.projects.index')->with('success', 'Project updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('backend.projects.index')->with('success', 'Project deleted successfully.');
    }
}
