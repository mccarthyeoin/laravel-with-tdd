<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => auth()->user()->projects,
        ]);
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store()
    {
        $project = auth()->user()->projects()->create(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3',
        ]));

        return redirect($project->path());
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $project->update(request(['notes']));

        return redirect($project->path());
    }
}
