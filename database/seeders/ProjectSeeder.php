<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('db.projects');

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->author = $project['author'];
            isset($project['type_id']) ? $newProject->type_id = $project['type_id'] : $newProject->type_id = NULL;
            $newProject->proj_image = $project['image'];
            $newProject->description = $project['description'];
            $newProject->start_date = $project['start_date'];
            $newProject->completion_date = $project['completion_date'];
            $newProject->no_days_taken = (strtotime($project['completion_date']) - strtotime($project['start_date'])) / 86400;
            if($newProject->no_days_taken === 0) $newProject->no_days_taken = 1;

            $newProject->save();
       }
    }
}
