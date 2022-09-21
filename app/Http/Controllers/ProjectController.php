<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProjectRequest;
use Symfony\Component\Console\Input\Input;

class ProjectController extends Controller
{   

    public function __construct () {
      
      $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request) {
    
        $term = $request->get('term');
        /* $querys = Project::where('title', 'LIKE', '%'. $term . '%')->get(); */
        $querys = Project::search($term)->get();
      
      return view ('projects.index', [
         'projects' => Project::search($term)->paginate(10)
        ]);
    }
    
      public function create ()
      {
        return view ('projects.create', [
          'project' => new Project
        ]);
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        /* $title = $request->get('title');
        $url = $request->get('url');
        $description = $request->get('description'); */

        /* Project::create([
          'title' => $request->get('title'),
          'url' => $request->get('url'),
          'description' => $request->get('description')
        ]); */

      /*   $fields = request()->validate ([
          'title' => 'required',
          'url' => 'required',
          'description' => 'required'
        ]); */

        /* Project::create(request()->only('title', 'url', 'description')); */

        Project::create( $request->validated() );

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view ('projects.show', [
          'project' => $project
        ]);
    }

    public function edit (Project $project)	{
      return view ('projects.edit', [
        'project' => $project
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
      $project->update($request->validated());

      return redirect()->route('projects.index')->with('status', 'El proyecto fue actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con exito.');
    }
}
