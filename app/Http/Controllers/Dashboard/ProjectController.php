<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Repos\ProjectRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    use HttpResponses;
    protected ProjectRepo $projectRepo;
    protected $model;
    protected $user;

    public function __construct(ProjectRepo $projectRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->projectRepo = $projectRepo;
        $this->model = new Project();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.projects.index', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation the request
        $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create Project');
        }

        // store the Project
        $this->projectRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.projects.index')->with('success','Project created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = $this->projectRepo->show($this->model, $project->id, $this->user);
        return view('dashboard.pages.projects.show', compact('project'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Project $project)
    {
        $projectData = $this->projectRepo->show($this->model, $project->id, $this->user);
        return view('dashboard.pages.projects.edit', compact('projectData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create Project');
        }

        // update the Project
        $this->projectRepo->update($this->model,$project->id, $request->all(), $this->user);

        return redirect()->route('dashboard.projects.index')->with('success','Project created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $deleteProject = $this->projectRepo->delete($this->model, $project->id, $this->user);

        if (!$deleteProject) {
            return $this->success(null, "Project Deleted Successfully", 200);
        }
    }
}
