<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListProjectsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_projects()
    {   
        /* $this->whithoutExceptionHandling(); */

        $project = Project::create([
            'title' => 'Mi nuevo proyecto',
            'url' => 'mi-nuevo-proyecto',
            'description' => 'Descripcion de mi nuevo proyecto'
        ]);

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);

        $response->assertSee($project->title);
    }
}
