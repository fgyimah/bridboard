<?php

namespace App\Http\Controllers;



use App\Models\Project;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project) {
        return view('projects.show', compact('project'));
    }

    public function store() {
        $validatedAttributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $validatedAttributes['owner_id'] = auth()->id();

        Project::create($validatedAttributes);

        return redirect('/projects');
    }
}
