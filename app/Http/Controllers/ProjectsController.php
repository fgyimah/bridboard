<?php

namespace App\Http\Controllers;


use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'title' => 'required',
            'description' => 'required|max:100',
            'notes' => 'min:3'
        ]);

        $project = auth()->user()->projects()->create($validatedAttributes);

        return redirect($project->path());
    }

    public function update(Project $project) {
        $this->authorize('update', $project);

        $project->update([
            'notes' => request('notes')
        ]);

        return redirect($project->path());
    }
}
