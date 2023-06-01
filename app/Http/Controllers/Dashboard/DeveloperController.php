<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Repos\DeveloperRepo;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class DeveloperController extends Controller
{
    use HttpResponses;
    protected DeveloperRepo $developerRepo;
    protected $model;
    protected $user;

    public function __construct(DeveloperRepo $developerRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->developerRepo = $developerRepo;
        $this->model = new Developer();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = $this->developerRepo->retrieve($this->model, $this->user);
        return view('developers.index', compact('developers'));
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
            return redirect()->back()->with('error','error in create developer');
        }

        // store the developer
        $this->developerRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.developers.index')->with('success','developer created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        $developer = $this->developerRepo->show($this->model, $developer->id, $this->user);
        return view('dashboard.pages.developers.show', compact('developer'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Developer $developer)
    {
        $developerData = $this->developerRepo->show($this->model, $developer->id, $this->user);
        return view('dashboard.pages.developers.edit', compact('developerData'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
         // validation the request
         $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            return redirect()->back()->with('error','error in create developer');
        }

        // update the developer
        $this->developerRepo->update($this->model,$developer->id, $request->all(), $this->user);

        return redirect()->route('dashboard.developers.index')->with('success','developer created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        $deletedeveloper = $this->developerRepo->delete($this->model, $developer->id, $this->user);

        if (!$deletedeveloper) {
            return $this->success(null, "developer Deleted Successfully", 200);
        }
    }
}

