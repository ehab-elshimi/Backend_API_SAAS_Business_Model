<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Developer;

use App\Http\Controllers\Controller;
use App\Models\ExperiencePeriod;
use App\Repos\ExperiencePeriodRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExperiencePeriodController extends Controller
{
    use HttpResponses;
    protected ExperiencePeriodRepo $experiencePeriodRepo;
    protected $model;
    protected $user;

    public function __construct(ExperiencePeriodRepo $experiencePeriodRepo)
    {
        // en sure that user is autherizable and get his id
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

        $this->experiencePeriodRepo = $experiencePeriodRepo;
        $this->model = new ExperiencePeriod();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = $this->experiencePeriodRepo->retrieve($this->model, $this->user);
        return view('dashboard.pages.developers.index', compact('developers'));
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
        $this->experiencePeriodRepo->store($this->model, $request->toArray(), $this->user);

        return redirect()->route('dashboard.developers.index')->with('success','developer created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        $developer = $this->experiencePeriodRepo->show($this->model, $developer->id, $this->user);
        return view('dashboard.pages.developers.show', compact('developer'));
    }
    /**
     * Display the specified resource.
     */
    public function edit(Developer $developer)
    {
        $developerData = $this->experiencePeriodRepo->show($this->model, $developer->id, $this->user);
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
        $this->experiencePeriodRepo->update($this->model,$developer->id, $request->all(), $this->user);

        return redirect()->route('dashboard.developers.index')->with('success','developer created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        $deleteDeveloper = $this->experiencePeriodRepo->delete($this->model, $developer->id, $this->user);

        if (!$deleteDeveloper) {
            return $this->success(null, "Developer Deleted Successfully", 200);
        }
    }
}
