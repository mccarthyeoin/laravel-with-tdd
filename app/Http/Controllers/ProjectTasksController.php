<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    protected $guarded = [];

    public function store(Project $project)
    {
        $this->authorize('update', $project);

        $project->addTask(
            request()->validate(['body' => 'required'])['body']
        );

        return redirect($project->path());
    }

    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);

        request()->validate(['body' => 'required']);

        $task->update([
            'body' => request('body'),
            'completed' => request()->has('completed'),
        ]);

        return redirect($project->path());
    }
}
