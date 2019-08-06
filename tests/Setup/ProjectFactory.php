<?php

namespace Tests\Setup;

use App\Task;
use App\User;
use App\Project;

class ProjectFactory
{
    protected $tasksCount = 0;
    protected $user;

    public function withTasks(int $count)
    {
        $this->tasksCount = $count;

        return $this;
    }

    public function ownedBy(User $user)
    {
        $this->user = $user;

        return $this;
    }

    public function create()
    {
        $project = factory(Project::class)->create([
            'owner_id' => $this->user ?? factory(User::class),
        ]);

        if ($this->tasksCount) {
            factory(Task::class, $this->tasksCount)->create([
                'project_id' => $project->id,
            ]);
        }

        return $project;
    }
}
