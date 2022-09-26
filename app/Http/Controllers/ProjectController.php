<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
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
            'newProject' => new Project,
            /* 'projects' => Project::search($term)->paginate(10) */
            'projects' => Project::with('category')->latest()->paginate(),
            'deletedProjects' => Project::onlyTrashed()->get()
        ]);
    }
    
    public function create ()
    {
        $this->authorize('create', $project = new Project);
        
        return view ('projects.create', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
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
        
        $project = new Project( $request->validated() );
        
        $this->authorize('create', $project);
        
        $project->image = $request->file('image')->store('images');
        
        $project->save();
        
        //Disparar un evento (evento que ya ha ocurrido)
        //ProjectSaved
        ProjectSaved::dispatch($project);
        
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
        
        $this->authorize('update', $project);
        
        return view ('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
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
        $this->authorize('update', $project);
        
        if ($request->hasFile('image')) {
            Storage::delete($project->image);
            
            $project->fill( $request->validated() );
            
            $project->image = $request->file('image')->store('images');
            
            $project->save();
            
            ProjectSaved::dispatch($project);
            
        } else {
            $project->update( array_filter($request->validated()));
        }
        
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
        $this->authorize('delete', $project);
        
        $project->delete();
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con exito.');
    }
    
    public function restore($projectUrl)
    {   
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();
        
        $this->authorize('restore', $project);
        
        $project->restore();
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue restaurado con exito.');
    }
    
    public function forceDelete($projectUrl)
    {   
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();
        
        $this->authorize('force-delete', $project);
        
        Storage::delete($project->image);
        
        $project->forceDelete();
        
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado permanentemente con exito.');
    }
}
